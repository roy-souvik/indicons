<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $address = data_get($this->data, 'email', 'No Email');
        $subject = 'Someone contacted us';
        $name = data_get($this->data, 'name', 'No name');

        return $this->view('emails.contact-us')
            ->from($address, $name)
            ->subject($subject)
            ->with(['data' => $this->data]);
    }
}
