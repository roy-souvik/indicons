<?php

namespace App\Http\Controllers;

use App\Mail\PaymentSuccess;
use App\Models\AccompanyingPerson;
use App\Models\ConferencePayment;
use App\Models\Fee;
use App\Models\Role;
use App\Models\SiteConfig;
use App\Models\User;
use App\Models\VaiMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function showConferencePaymentPage()
    {
        $registrationTypeAuth = [
            'is_early_bird' => !Carbon::createFromFormat('Y-m-d', '2022-10-31')->isPast(),
            'is_standard' => !Carbon::createFromFormat('Y-m-d', '2023-01-15')->isPast(),
            'is_spot' => true,
        ];

        $user = Auth::user();
        $paymentSlabItem = Fee::where('role_id', $user->role->id)->firstOrFail();

        $accompanyingPersonRole = Role::firstWhere('key', 'accompanying_person');
        $accompanyingPersonFees = Fee::where('role_id', $accompanyingPersonRole->id)->firstOrFail();
        $accompanyingPersons = AccompanyingPerson::where('user_id', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->limit(2)
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
            'early_bird' => $vaiMemberDiscounts['early_bird'] + $saarcDiscounts['early_bird'],
            'standard' => $vaiMemberDiscounts['standard'] + $saarcDiscounts['standard'],
            'spot' => $vaiMemberDiscounts['spot'] + $saarcDiscounts['spot'],
        ];

        $pickupDropPrice = SiteConfig::where('name', 'pick_drop_price')->first();

        return view('conference-payment', compact(
            'paymentSlabItem',
            'registrationTypeAuth',
            'accompanyingPersonFees',
            'accompanyingPersons',
            'discounts',
            'isVaiMember',
            'pickupDropPrice',
            'user',
        ));
    }

    public function saveConferencePayment(Request $request): ConferencePayment
    {
        $authUser = Auth::user();
        $payment = new ConferencePayment();

        $payment->user_id = $authUser->id;
        $payment->transaction_id = $request->transaction_id;
        $payment->status = $request->status;
        $payment->amount = $request->amount;
        $payment->payment_response = json_encode($request->payment_response);
        $payment->registration_type = $request->member_registration_type;
        $payment->pickup_drop = $request->input('pickup_drop', false);
        $payment->airplane_booking = $request->input('airplane_booking', false);

        $payment->save();

        $companionRole = Role::firstWhere('key', 'accompanying_person');
        $companionTotalAmount = intval($request->amount) - intval(data_get($request, 'payer_amount', 0));
        $companionFee = Fee::firstWhere('role_id', $companionRole->id)->spot_amount;
        $companionCount = $companionTotalAmount / intval($companionFee);

        $accompanyingPersons = AccompanyingPerson::where('user_id', $authUser->id)
            ->where('confirmed', 0)
            ->orderBy('id', 'desc')
            ->limit($companionCount)
            ->get();

        if (!empty($request->status)) {
            foreach ($accompanyingPersons as $person) {
                $person->confirmed = 1;
                $person->save();
            }
        }

        Mail::to($authUser)->send(new PaymentSuccess($request->transaction_id));

        return $payment;
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

    private function isVaiMember(User $user): bool
    {
        $vaiMember = VaiMember::where('vai_number', $user->vaicon_member_id)->first();

        if (empty($vaiMember)) {
            return false;
        }

        return Str::contains($vaiMember->name, $user->getDisplayName());
    }
}
