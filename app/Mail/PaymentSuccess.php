<?php

namespace App\Mail;

use App\Models\ConferencePayment;
use App\Models\Fee;
use App\Models\SiteConfig;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentSuccess extends Mailable
{
    use Queueable, SerializesModels;

    public $transactionId;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $transactionId)
    {
        $this->transactionId = $transactionId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $payment = ConferencePayment::with(['user.companions', 'accommodations.room'])
            ->where('transaction_id', $this->transactionId)
            ->first();

        $fee = Fee::where('role_id', $payment->user->role_id)->first();

        $pickupDropPrice = SiteConfig::where('name', 'pick_drop_price')->first()?->value;

        $roomCount = 0;

        if ($payment->accommodations->count()) {
            $roomCount = $payment->accommodations->reduce(function ($carry, $accommodation) {
                return $carry + intval($accommodation->room_count);
            }, 0);
        }

        return $this->view('emails.payment-success')
            ->with([
                'payment' => $payment,
                'fee' => $fee,
                'pickupDropPrice' => $pickupDropPrice,
                'roomCount' => $roomCount,
            ]);
    }
}
