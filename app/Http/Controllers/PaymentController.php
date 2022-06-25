<?php

namespace App\Http\Controllers;

use App\Mail\PaymentSuccess;
use App\Models\AccompanyingPerson;
use App\Models\ConferencePayment;
use App\Models\Fee;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

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

        return view('conference-payment', compact(
            'paymentSlabItem',
            'registrationTypeAuth',
            'accompanyingPersonFees',
            'accompanyingPersons',
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
}
