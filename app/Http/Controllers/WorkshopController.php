<?php

namespace App\Http\Controllers;

use App\Mail\WorkshopPaymentSuccess;
use App\Models\WorkshopPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class WorkshopController extends Controller
{
    public function saveWorkshopPayment(Request $request)
    {
        $payment = new WorkshopPayment();

        $payment->user_id = Auth::user()->id;
        $payment->workshop_id = data_get($request, 'workshop_id');
        $payment->transaction_id = $request->transaction_id;
        $payment->status = $request->status;
        $payment->amount = $request->amount ? $request->amount / 100 : 0;
        $payment->payment_response = json_encode($request->payment_response);

        $payment->save();

        Mail::to(Auth::user())->send(new WorkshopPaymentSuccess($request->transaction_id));

        return $payment;
    }
}
