<?php

namespace App\Http\Controllers;

use App\Mail\PaymentSuccess;
use App\Models\AccompanyingPerson;
use App\Models\ConferencePayment;
use App\Models\Coupon;
use App\Models\Fee;
use App\Models\Hotel;
use App\Models\Role;
use App\Models\SiteConfig;
use App\Models\User;
use App\Models\UserRoom;
use App\Models\VaiMember;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Razorpay\Api\Api;

class PaymentController extends Controller
{
    private Api $api;

    public function __construct()
    {
        $paymentEnvironment = config('razorpay.mode');
        $keyId = config("razorpay.{$paymentEnvironment}")['key_id'];
        $keySecret = config("razorpay.{$paymentEnvironment}")['key_secret'];

        $this->api = new Api($keyId, $keySecret);
    }

    public function showConferencePaymentPage(Request $request)
    {
        $user = Auth::user();

        $coupon = $request->session()->has(Coupon::storageKey($user->id))
            ? Coupon::findByCode($request->session()->get(Coupon::storageKey($user->id)))
            : null;

        $config = SiteConfig::whereIn('name', ['early_bird', 'standard'])->get();
        $earlyBirdConfig = $config->where('name', 'early_bird')->first();
        $standardConfig = $config->where('name', 'standard')->first();

        $registrationTypeAuth = [
            'is_early_bird' => !Carbon::createFromFormat('Y-m-d', $earlyBirdConfig->value)->isPast(),
            'is_standard' => !Carbon::createFromFormat('Y-m-d', $standardConfig->value)->isPast(),
            'is_spot' => true,
        ];


        $paymentSlabItem = Fee::where('role_id', $user->role->id)->firstOrFail();

        $couponDiscounts = [];

        if (!empty($coupon)) {
            $couponDiscounts = [
                'early_bird' => intval($coupon->discount(($paymentSlabItem->early_bird_amount))),
                'standard' => intval($coupon->discount(($paymentSlabItem->standard))),
                'spot' => intval($coupon->discount(($paymentSlabItem->spot))),
            ];
        }

        $accompanyingPersonRole = Role::firstWhere('key', 'accompanying_person');
        $accompanyingPersonFees = Fee::where('role_id', $accompanyingPersonRole->id)->firstOrFail();
        $accompanyingPersons = AccompanyingPerson::where('user_id', Auth::user()->id)
            ->where('is_active', 0)
            ->orderBy('id', 'desc')
            ->get();

        $isVaiMember = $this->isVaiMember($user);

        $vaiMemberDiscounts = [
            'early_bird' => $isVaiMember ? intval($paymentSlabItem->early_bird_member_discount) : 0,
            'standard' => $isVaiMember ? intval($paymentSlabItem->standard_member_discount) : 0,
            'spot' => $isVaiMember ? intval($paymentSlabItem->spot_member_discount) : 0,
        ];

        $saarcDiscounts = [
            'early_bird' => !empty($user->isSaarcResident()) ? intval($paymentSlabItem->saarc_discount) : 0,
            'standard' => !empty($user->isSaarcResident()) ? intval($paymentSlabItem->saarc_discount) : 0,
            'spot' => !empty($user->isSaarcResident()) ? intval($paymentSlabItem->saarc_discount) : 0,
        ];

        $discounts = [
            'early_bird' => $vaiMemberDiscounts['early_bird'] + $saarcDiscounts['early_bird'] + data_get($couponDiscounts, 'early_bird', 0),
            'standard' => $vaiMemberDiscounts['standard'] + $saarcDiscounts['standard'] + data_get($couponDiscounts, 'standard', 0),
            'spot' => $vaiMemberDiscounts['spot'] + $saarcDiscounts['spot'] + data_get($couponDiscounts, 'spot', 0),
        ];

        $pickupDropPrice = SiteConfig::where('name', 'pick_drop_price')->first();

        $razorPayKey = $this->api->getKey();

        $hotels = Hotel::with(['rooms'])->active()->get();

        $bookingPeriod = CarbonPeriod::create('2023-01-26', '2023-01-30');

        return view('conference-payment', compact(
            'paymentSlabItem',
            'registrationTypeAuth',
            'accompanyingPersonFees',
            'accompanyingPersons',
            'discounts',
            'isVaiMember',
            'pickupDropPrice',
            'user',
            'hotels',
            'razorPayKey',
            'bookingPeriod',
            'coupon',
        ));
    }

    public function saveConferencePayment(Request $request): ConferencePayment
    {
        $authUser = Auth::user();
        $payment = new ConferencePayment();

        $isValidSignature = $this->verifySignature(
            data_get($request->payment_response, 'order_response.id'),
            data_get($request->payment_response, 'checkout_response')
        );

        if (empty($isValidSignature)) {
            return response()->json([
                'data' => null,
                'message' => 'There is an error while verifying your payment. Please contact admin.',
            ], 400);
        }

        $coupon = $request->session()->has(Coupon::storageKey($authUser->id))
            ? Coupon::findByCode($request->session()->get(Coupon::storageKey($authUser->id)))
            : null;

        try {
            $payment->user_id = $authUser->id;
            $payment->transaction_id = $request->transaction_id;
            $payment->status = $request->status ?? '';
            $payment->amount = $request->amount ? $request->amount / 100 : 0;
            $payment->payment_response = json_encode($request->payment_response);
            $payment->registration_type = $request->input('member_registration_type');
            $payment->pickup_drop = $request->input('pickup_drop', false);
            $payment->airplane_booking = $request->input('airplane_booking', false);
            $payment->payment_title = $request->input('payment_title');
            $payment->coupon_id = !empty($coupon) ? $coupon->id : null;

            $payment->save();

            $companionRole = Role::firstWhere('key', 'accompanying_person');
            $companionTotalAmount = $request->input('companion_amount')
                ? intval($request->input('companion_amount'))
                : intval($request->amount) - intval(data_get($request, 'payer_amount', 0));
            $companionFee = Fee::firstWhere('role_id', $companionRole->id)->spot_amount;

            $companionCount = floor($companionTotalAmount / intval($companionFee));

            $accompanyingPersons = AccompanyingPerson::where('user_id', $authUser->id)
                ->where('confirmed', 0)
                ->orderBy('id', 'desc')
                ->limit($companionCount)
                ->get();

            $existingRoomCount = UserRoom::where('transaction_id', $request->transaction_id)->count();

            if ($existingRoomCount === 0) {
                foreach ($request->booking_dates as $date) {
                    foreach ($request->rooms as $room) {
                        $userRoom = new UserRoom();
                        $userRoom->user_id = $authUser->id;
                        $userRoom->room_id = data_get($room, 'id');
                        $userRoom->room_count = data_get($room, 'count');
                        $userRoom->booking_date = Carbon::createFromFormat('Y-m-d', $date);
                        $userRoom->amount = data_get($room, 'amount');
                        $userRoom->transaction_id = $request->transaction_id;

                        $userRoom->save();
                    }
                }
            }

            if (!empty($request->status)) {
                foreach ($accompanyingPersons as $person) {
                    $person->confirmed = 1;
                    $person->save();
                }
            }

            if (!empty($coupon)) {
                $coupon->user_id = $authUser->id;
                $coupon->is_active = 0;
                $coupon->save();

                $request->session()->forget(Coupon::storageKey($authUser->id));
            }

            Mail::to($authUser)->send(new PaymentSuccess($request->transaction_id));

            return $payment;
        } catch (\Throwable $th) {
            return response()->json([
                'data' => null,
                'message' => 'There is an error while processing your payment details. Please contact admin.',
            ], 500);
        }
    }

    public function paymentCancel()
    {
        dd('Your payment has been declined.');
    }

    public function paymentSuccess(Request $request)
    {
        $transactionId = $request->transaction_id;

        return view('payment-success', compact('transactionId'));
    }

    public function createOrder(Request $request)
    {
        $request->validate([
            'amount' => ['required', 'numeric'],
        ]);

        $orderData = [
            'amount' => $request->amount * 100,
            'currency' => 'INR',
            'notes' => [],
        ];

        try {
            $order = $this->api->order->create($orderData);
        } catch (\Throwable $th) {
            return response()->json([
                'data' => null,
                'message' => 'There is an error',
            ], 400);
        }

        return response()->json([
            'data' => [
                'id' => $order->id,
                'entity' => $order->entity,
                'amount' => $order->amount,
                'currency' => $order->currency,
                'status' => $order->status,
                'attempts' => $order->attempts,
                'notes' => $order->notes,
            ],
            'message' => 'Order created',
        ], 201);
    }

    private function isVaiMember(User $user): bool
    {
        $vaiMember = VaiMember::where('vai_number', $user->vaicon_member_id)->first();

        if (empty($vaiMember)) {
            return false;
        }

        return Str::contains($vaiMember->name, $user->getDisplayName());
    }

    private function verifySignature($orderId, $checkoutResponse): bool
    {
        $generated_signature = hash_hmac('sha256', $orderId . "|" . data_get($checkoutResponse, 'razorpay_payment_id'), $this->api->getSecret());

        return $generated_signature === data_get($checkoutResponse, 'razorpay_signature');
    }
}
