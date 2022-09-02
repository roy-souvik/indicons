<?php

namespace App\Http\Controllers;

use App\Models\WorkshopPayment;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    public function saveWorkshopPayment(Request $request)
    {
        $payment = new WorkshopPayment();

        $payment->user_id = Auth::user()->id;
        $payment->workshop_id = data_get($request, 'workshop_id');
        $payment->transaction_id = $request->transaction_id;
        $payment->status = $request->status;
        $payment->amount = $request->amount;
        $payment->payment_response = json_encode($request->payment_response);

        $payment->save();

        // Mail::to(Auth::user())->send(new WorkshopPaymentSuccess($request->transaction_id));

        return $payment;
    }
}
