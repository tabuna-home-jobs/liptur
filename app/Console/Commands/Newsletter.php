<?php

namespace App\Console\Commands;

use App\Core\Models\Post;
use App\Mail\MailNewsletter;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Orchid\Core\Models\Newsletter as NewsletterModel;

class Newsletter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'newsletter:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Новостная рассылка';

    /**
     * @var
     */
    protected $news;

    /**
     * @var
     */
    protected $events;

    /**
     * Newsletter constructor.
     */
    public function __construct()
    {
        parent::__construct();
        App::setLocale('ru');
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->events = Post::where('type', 'festivals')
            ->whereNotNull('options->locale->' . App::getLocale())
            ->whereDate('publish_at', '>=', Carbon::today()->toDateString())
            ->limit(2)
            ->with(['attachment'])
            ->get();

        $this->news = Post::where('type', 'news')
            ->whereNotNull('options->locale->' . App::getLocale())
            ->whereDate('publish_at', '>=', Carbon::today()->subWeek()->toDateString())
            ->whereDate('publish_at', '<=', Carbon::now()->addWeek()->toDateString())
            ->with(['likeCounter', 'attachment'])
            ->get()
            ->sortBy(function ($news) {
                return $news->likeCount;
            })->take(6);

        $this->users = NewsletterModel::select('email')->chunk(200, function ($subscriptions) {
            foreach ($subscriptions as $subscription) {
                $this->send($subscription->email);
            }
        });

    }

    /**
     * @param $email string
     */
    protected function send($email)
    {
        $message = (new MailNewsletter($this->events, $this->news))->onQueue('emails');
        Mail::to($email)->queue($message);
    }

}
