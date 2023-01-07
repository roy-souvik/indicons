<?php

namespace App\Mail;

use App\Models\AdminRegistration;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminRegisterConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $registration;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(AdminRegistration $registration)
    {
        $this->registration = $registration;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "VAICON 2023 registration confirmation";

        return $this->view('emails.admin-registration-confirmation')
            ->subject($subject)
            ->with([
                'registration' => $this->registration,
            ]);
    }
}
