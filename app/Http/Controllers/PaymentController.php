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
        $payment = new ConferencePayment();

        $payment->user_id = Auth::user()->id;
        $payment->transaction_id = $request->transaction_id;
        $payment->status = $request->status;
        $payment->amount = $request->amount;
        $payment->payment_response = json_encode($request->payment_response);

        $payment->save();

        Mail::to(Auth::user())->send(new PaymentSuccess($request->transaction_id));

        return $payment;
    }

    // public function handlePayment()
    // {
    //     $product = [];
    //     $product['items'] = [
    //         [
    //             'name' => 'Nike Joyride 2',
    //             'price' => 112,
    //             'desc'  => 'Running shoes for Men',
    //             'qty' => 2
    //         ]
    //     ];

    //     $product['invoice_id'] = 1;
    //     $product['invoice_description'] = "Order #{$product['invoice_id']} Bill";
    //     $product['return_url'] = route('success.payment');
    //     $product['cancel_url'] = route('cancel.payment');
    //     $product['total'] = 224;

    //     $paypalModule = new ExpressCheckout;

    //     $res = $paypalModule->setExpressCheckout($product);
    //     $res = $paypalModule->setExpressCheckout($product, true);

    //     return redirect($res['paypal_link']);
    // }

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
