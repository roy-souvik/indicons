<?php

namespace App\Mail;

use App\Models\SponsorshipPayment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SponsorshipPaymentSuccess extends Mailable
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
        $payment = SponsorshipPayment::with(['user', 'sponsorship'])
            ->where('transaction_id', $this->transactionId)
            ->first();

        return $this->view('emails.sponsorship-payment-success')
            ->with([
                'payment' => $payment,
            ]);
    }
}
