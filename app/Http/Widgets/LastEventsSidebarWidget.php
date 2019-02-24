<?php

namespace App\Http\Widgets;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Orchid\Widget\Widget;

class LastEventsSidebarWidget extends Widget
{
    /**
     * @param int $limit
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function handler($limit = 6)
    {
        $locale = App::getLocale();

        $events = Cache::remember('sidebar-events-'.$locale.'-'.$limit, Carbon::now()->addHour(), function () use ($locale, $limit) {
            return Post::published()
                ->where('type', 'festivals')
                ->whereNotNull('content->'.$locale)
                ->whereRaw('content->"$.'.$locale.'.open"  < "'.Carbon::now()->addMonth(2)->toDateString().'"')
                ->whereRaw('content->"$.'.$locale.'.close"  > "'.Carbon::today()->toDateString().'"')
                ->orderBy('publish_at', 'ASC')
                ->limit($limit)
                ->get();
        });

        return view('partials.events.sidebar', [
            'events' => $events,
        ]);
    }
}
