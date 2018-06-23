<?php

namespace App\Mail;

use App\Core\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var
     */
    public $token;

    /**
     * MailResetPassword constructor.
     *
     * @param User $user
     * @param      $token
     */
    public function __construct(User $user, $token)
    {
        $this->to($user->email);
        $this->token = $token;
        $this->subject = 'Запрос востановления пароля';

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.reset', [
            'token' => $this->token,
        ]);
    }
}
