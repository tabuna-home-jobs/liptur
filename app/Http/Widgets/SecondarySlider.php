<?php

namespace App\Http\Widgets;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Orchid\Support\Facades\Setting;
use Orchid\Widget\Widget;

class SecondarySlider extends Widget
{
    /**
     * @return mixed
     */
    public function handler()
    {
        $carousel = Cache::remember('secondary-carousel-'.App::getLocale(), 5, function () {
            return Post::where('type', 'secondary-carousel')
                ->whereNotNull('options->locale->'.App::getLocale())
                ->has('attachment')
                ->whereDate('publish_at', '>=', Carbon::today()->toDateString())
                ->orderBy('publish_at', 'ASC')
                ->limit(10)
                ->get();
        });

        $tours = Cache::remember('tours-'.App::getLocale(), 0, function () {
            return Post::where('type', 'tour')
                ->with(['attachment'])
                ->whereHas('attachment', function ($q) {
                    $q->where('group', 'main');
                })
                ->whereHas('attachment', function ($q) {
                    $q->where('group', 'sub');
                })
                ->whereNotNull('options->locale->'.App::getLocale())
                ->whereDate('content->'.App::getLocale().'->open', '>=', Carbon::today()->toDateString())
                ->orderBy('content->'.App::getLocale().'->open', 'DESC')
                ->limit(3)
                ->get();
        });

        if ($carousel->count() != 0) {
            return view('partials.events.secondary', [
                'carousel' => $carousel,
                'tours'  => $tours,
            ]);
        }
    }
}
