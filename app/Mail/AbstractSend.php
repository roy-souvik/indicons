<?php

namespace App\Mail;

use App\Models\ConferenceAbstract;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AbstractSend extends Mailable
{
    use Queueable, SerializesModels;

    public $abstract;
    public $status;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ConferenceAbstract $abstract)
    {
        $this->abstract = $abstract;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "[Vaicon 2023], Abstract Review Request [{$this->abstract->abstract_id}]";

        return $this->view('emails.abstract-details')
            ->subject($subject)
            ->with([
                'abstract' => $this->abstract,
            ]);
    }
}
