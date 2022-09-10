<?php

namespace App\Mail;

use App\Models\ConferencePayment;
use App\Models\Fee;
use App\Models\WorkshopPayment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WorkshopPaymentSuccess extends Mailable
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
        $payment = WorkshopPayment::with(['user', 'workshop'])
            ->where('transaction_id', $this->transactionId)
            ->first();

        return $this->view('emails.workshop-payment-success')
            ->with([
                'payment' => $payment,
            ]);
    }
}
