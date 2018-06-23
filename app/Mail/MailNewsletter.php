<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNewsletter extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * @var
     */
    protected $email;

    /**
     * @var
     */
    protected $events;

    /**
     * @var
     */
    protected $news;

    /**
     * MailNewsletter constructor.
     *
     * @param $events
     * @param $news
     */
    public function __construct($events, $news)
    {
        $this->events = $events;
        $this->news = $news;
        $this->subject = 'Вы успешно зарегистрировались на сайте';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Последние события Липецкой области')
            ->view('emails.newsletter')
            ->with([
                'events' => $this->events,
                'news'   => $this->news,
            ]);
    }
}
