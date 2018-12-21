<?php

namespace App\Http\Controllers\Other;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Orchid\Platform\Core\Models\Post;

class CalendarEvent extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $elements = Post::published()->where('type', 'event_calendar')
            ->whereNotNull('options->locale->'.App::getLocale())
            ->whereDate('publish_at', '<', time())
            ->orderBy('id', 'DESC')
            ->get();

        $types = dashboard_posts();

        $typeObject = null;
        foreach ($types as $type) {
            if ($type->slug == 'event_calendar') {
                $typeObject = $type;
                break;
            }
        }

        if (is_null($typeObject)) {
            abort(404);
        }

        $elements->transform(function ($item, $key) {
            $open = Carbon::parse($item['content'][App::getLocale()]['open']);
            $item['month'] = $open->month;
            $item['day'] = $open->day;

            return $item;
        });

        $time = Carbon::now();
        $Month = [];

        $i = 0;
        while ($i < 12) {
            $event = $elements->where('month', $time->month)->sortBy('day');
            if (!$event->isEmpty()) {
                $Month[$time->formatLocalized('%B')] = $event;
            }
            $time->addMonth();
            $i++;
        }

        return view('listings.catalog-event', [
            'elements' => $elements,
            'type'     => $typeObject,
            'name'     => $typeObject->name,
            'month'    => $Month,
            'page'     => getPage('event_calendar'),
        ]);
    }

    /**
     * @param      $typeRequest
     * @param Post $item
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($typeRequest, Post $item)
    {
        $types = dashboard_posts();
        $typeObject = null;
        foreach ($types as $type) {
            if ($type->slug == $typeRequest) {
                $typeObject = $type;
                break;
            }
        }

        if (is_null($typeObject)) {
            abort(404);
        }

        return view('pages.item', [
            'item' => $item,
            'type' => $typeObject,
        ]);
    }

    /**
     * @param $category
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category($category)
    {
        $elements = $category->post()
            ->whereNotNull(App::getLocale())
            ->whereDate('publish_at', '<', time())
            ->orderBy('id', 'DESC')
            ->simplePaginate();

        return view('listings.catalog', [
            'elements' => $elements,
            'name'     => $category->getContent('name'),
        ]);
    }
}
