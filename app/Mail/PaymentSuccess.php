<?php

namespace App\Mail;

use App\Models\ConferencePayment;
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
        $data = ConferencePayment::getPaymentReceiptData($this->transactionId);

        return $this->view('emails.payment-success')->with($data);
    }
}
