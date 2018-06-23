<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Info extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var
     */
    public $message;

    /**
     * Info constructor.
     *
     * @param $email
     * @param $subject
     * @param $message
     */
    public function __construct($email, $subject, $message)
    {
        $this->to($email);
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.info', [
            'text' => $this->message,
        ]);
    }
}
