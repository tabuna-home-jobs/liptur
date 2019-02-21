<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Orchid\Press\Models\Post;

class MapsController extends Controller
{
    /**
     * Current locale.
     *
     * @var string
     */
    public $locale = 'en';

    /**
     * MapsController constructor.
     */
    public function __construct()
    {
        $this->locale = App::getLocale();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $types = Cache::remember('main-maps-list', Carbon::now()->addDays(2), function () {
            $types = collect(dashboard_posts())->where('maps', true);
            $types->map(function ($item, $key) {
                $count = Post::select('id')->where('type', $item->slug)->count();
                $item->count = $count;
                $item->popularImage = $item->display()->get('popularImage', '');
                $item->icon = $item->display()->get('icon');
                $item->name = $item->display()->get('name');

                return $item;
            });

            return $types->sortBy('name');
        });

        $chunk = round($types->count() / 4);

        return view('pages.maps', [
            'types' => $types,
            'chunk' => $chunk,
            'page'  => getPage('maps'),
        ]);
    }

    /**
     * @param $type
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($type)
    {
        $place = Cache::remember('global-maps-'.$type, Carbon::now()->addDays(2), function () use ($type) {
            $posts = Post::published()->where('type', $type)
                ->whereNotNull('content->'.$this->locale.'->place')
                ->get();
            $place = collect();

            if ($posts->count() != 0) {
                $display = $posts->first()->getBehaviorObject()->display();
            } else {
                $display = [];
            }

            foreach ($posts as $post) {
                $place->push([
                    'id'          => $post->id,
                    'slug'        => $post->slug,
                    'type'        => $post->type,
                    'display'     => $display,
                    'image'       => $post->hero('medium'),
                    'description' => str_strip_limit_words($post->getContent('body'), 200),
                    'name'        => $post->getContent('name'),
                    'place'       => $post->getContent('place'),
                ]);
            }

            return $place;
        });

        return response()->json($place);
    }
}
