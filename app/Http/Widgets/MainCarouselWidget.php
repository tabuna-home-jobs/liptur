<?php

namespace App\Http\Widgets;

use App\Core\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Orchid\Platform\Widget\Widget;

class MainCarouselWidget extends Widget
{
    /**
     * @return mixed
     */
    public function handler()
    {
        $locale = App::getLocale();
        $carousel = Cache::remember('main-carousel-'.$locale, 5, function () use ($locale) {
            return Post::where('type', 'carousel')
                ->whereNotNull('content->'.$locale)
                ->where('options->locale->'.$locale,'true')
                ->whereDate('publish_at', '>=', Carbon::today()->toDateString())
                ->orderBy('publish_at', 'ASC')
                ->limit(10)
                ->get();
        });
        if ($carousel->count() != 0) {
            return view('partials.events.carousel', [
                'carousel' => $carousel,
            ]);
        }
    }
}
