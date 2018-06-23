<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailReservationObject extends Mailable
{
    use Queueable, SerializesModels;

    protected $param;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($param)
    {

        $this->param = $param;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Заявка на бронирование, с сайта liptur.ru')
            ->view('emails.reservationobject')
            ->with([
                'param' => $this->param,
            ]);

    }
}
