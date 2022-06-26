<?php

namespace App\Mail;

use App\Models\ConferenceAbstract;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AbstractUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $abstract;
    public $status;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ConferenceAbstract $abstract, string $status)
    {
        $this->abstract = $abstract;
        $this->status = $status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Your Abstract {$this->abstract->abstract_id} is {$this->status}";

        return $this->view('emails.abstract-updated')
            ->subject($subject)
            ->with([
                'abstract' => $this->abstract,
            ]);
    }
}
