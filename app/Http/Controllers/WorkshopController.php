<?php

namespace App\Http\Controllers;

use App\Mail\WorkshopPaymentSuccess;
use App\Models\WorkshopPayment;
use App\Models\WorkshopUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Throwable;

class WorkshopController extends Controller
{
public function saveWorkshopPayment(Request $request)
{
    $validated = $request->validate([
        'transaction_id' => 'required|string',
        'status' => 'required|string',
        'amount' => 'required|numeric',
        'currency' => 'nullable|string',
        'payment_response' => 'required|array',
        'workshop_ids' => 'required|array',
    ]);

    $userId = Auth::id();

    DB::beginTransaction();

    try {
        $payment = WorkshopPayment::create([
            'user_id' => $userId,
            'transaction_id' => $validated['transaction_id'],
            'status' => $validated['status'],
            'amount' => $validated['amount'] / 100, // Razorpay sends in paise
            'currency' => $validated['currency'] ?? 'INR',
            'payment_response' => json_encode($validated['payment_response']),
        ]);

        foreach ($validated['workshop_ids'] as $workshopId) {
            WorkshopUser::create([
                'workshop_id' => $workshopId,
                'user_id' => $userId,
                'payments_id' => $payment->id,
            ]);
        }

        DB::commit();

        Mail::to(Auth::user())->send(new WorkshopPaymentSuccess($payment->transaction_id));

        return response()->json(['message' => 'Payment saved successfully.'], 200);
    } catch (Throwable $e) {
        DB::rollBack();

        report($e); // Optional: log the error

        return response()->json([
            'message' => 'Something went wrong while saving the payment.',
            'error' => $e->getMessage(),
        ], 500);
    }
}
}
