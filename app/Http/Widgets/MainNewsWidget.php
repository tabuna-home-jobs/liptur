<?php

namespace App\Http\Widgets;

use App\Core\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Orchid\Platform\Widget\Widget;

class MainNewsWidget extends Widget
{
    /**
     * @return mixed
     */
    public function handler()
    {
        $news = Cache::remember('main-news-'.App::getLocale(), Carbon::now()->addHour(), function () {
            return Post::published()->where('type', 'news')
                ->whereNotNull('options->locale->'.App::getLocale())
                ->whereDate('publish_at', '<', time())
                ->orderBy('publish_at', 'DESC')
                ->limit(3)
                ->get();
        });

        if ($news->count() != 0) {
            return view('partials.news.main', [
                'news' => $news,
            ]);
        }
    }
}
