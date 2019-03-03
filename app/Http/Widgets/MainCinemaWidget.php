<?php

namespace App\Http\Widgets;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use App\Models\Post;
use Orchid\Widget\Widget;

class MainCinemaWidget extends Widget
{
    /**
     * @return mixed
     */
    public function handler()
    {
        $locale = App::getLocale();

        $cinema = Cache::remember('widget-afisha-'.$locale, Carbon::now()->addHour(), function () use ($locale) {
            return Post::where('type', 'film')
                ->whereNotNull('content->'.$locale)
                ->where('content->'.$locale.'->IsNonStop', false)
                ->orderBy('publish_at', 'DESC')
                ->with('attachment')
                ->get();
        });

        if ($cinema->count() != 0) {
            return view('partials.events.cinema', [
                'cinema' => $cinema,
            ]);
        }
    }
}
