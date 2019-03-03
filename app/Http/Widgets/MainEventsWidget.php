<?php

namespace App\Http\Widgets;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Orchid\Widget\Widget;

class MainEventsWidget extends Widget
{
    /**
     * @return mixed
     */
    public function handler()
    {
        $locale = App::getLocale();

        $events = Cache::remember('main-events-'.$locale, Carbon::now()->addHour(), function () use ($locale) {
            return Post::published()->where('type', 'festivals')
                ->whereNotNull('content->'.$locale)
                ->whereRaw('content->"$.'.$locale.'.open"  < "'.Carbon::now()->addMonth(11)->toDateString().'"')
                ->whereRaw('content->"$.'.$locale.'.close"  > "'.Carbon::today()->toDateString().'"')
                ->orderBy('publish_at', 'ASC')
                ->limit(6)
                ->get();
        });

        return view('partials.events.main', [
            'events' => $events,
        ]);
    }
}
