<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $SendData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($SendData)
    {
        $this->SendData = $SendData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Welcome to The Suwasetha Group..')
        ->markdown('emails.subscribers');
        // return $this->subject('An enquiry mail has came. Please check!')->view('views.email');
    }
}
