<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscriberNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    private $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New post have been published on ' . $this->details['website_url'])
                    ->view('emails.newPostNotification', ['details' => $this->details]);
    }
}
