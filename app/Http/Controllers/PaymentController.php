<?php

namespace App\Http\Controllers;

use App\Models\ConferencePayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Srmklive\PayPal\ExpressCheckout;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function showConferencePaymentPage()
    {
        $paymentSlab = [
            [
                'role' => 'doctor',
                'currency' => 'INR',
                'early_bird_registration_fees' => 12000,
                'standard_registration_fees' => 13000,
                'spot_registration_fees' => 13000,
            ],
            [
                'role' => 'nurs_and_paramedic',
                'currency' => 'INR',
                'early_bird_registration_fees' => 12000,
                'standard_registration_fees' => 13000,
                'spot_registration_fees' => 13000,
            ],
            [
                'role' => 'nurs_and_paramedics',
                'currency' => 'INR',
                'early_bird_registration_fees' => 12000,
                'standard_registration_fees' => 13000,
                'spot_registration_fees' => 13000,
            ],
            [
                'role' => 'student',
                'currency' => 'INR',
                'early_bird_registration_fees' => 2,
                'standard_registration_fees' => 4,
                'spot_registration_fees' => 6,
            ],
            [
                'role' => 'international_deligate',
                'currency' => 'USD',
                'early_bird_registration_fees' => 150,
                'standard_registration_fees' => 170,
                'spot_registration_fees' => 200,
            ],
        ];

        $registrationTypeAuth = [
            'is_early_bird' => !Carbon::createFromFormat('Y-m-d', '2022-10-31')->isPast(),
            'is_standard' => !Carbon::createFromFormat('Y-m-d', '2023-01-15')->isPast(),
            'is_spot' => true,
        ];

        $user = Auth::user();

        $paymentSlabItem = Arr::first($paymentSlab, function ($value, $key) use ($user) {
            return $value['role'] === $user->role;
        });

        return view('conference-payment', compact('paymentSlabItem', 'registrationTypeAuth'));
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

        // TODO: Send email

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
