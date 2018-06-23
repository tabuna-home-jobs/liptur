<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MainWelcome extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * MainWelcome constructor.
     *
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
        $this->to($user->email);
        $this->subject = 'Вы успешно зарегистрировались на сайте';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.welcome', [
            'user' => $this->user,
        ]);
    }
}
