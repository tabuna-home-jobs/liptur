<?php

namespace App\Http\Widgets;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Orchid\Press\Models\Post;
use Orchid\Widget\Widget;

class MenuCategoryWidget extends Widget
{
    /**
     * Коллекция типов.
     *
     * @var static
     */
    public $types;

    /**
     * Часть.
     *
     * @var float
     */
    public $chunk;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->types = Cache::remember('main-category-list', Carbon::now()->addHour(2), function () {
            $types = collect(dashboard_posts())->where('category', true);
            $types->map(function ($item, $key) {
                $count = Post::published()->select('id')->where('type', $item->slug)->count();
                $item->count = $count;
                $item->popularImage = $item->display()->get('popularImage', '');
                $item->icon = $item->display()->get('icon');
                $item->name = $item->display()->get('name');

                return $item;
            });

            return $types->sortBy('name');
            //$this->types = $this->types->sortByDesc('count');
        });

        $this->chunk = round($this->types->count() / 4);
    }

    /**
     * @return mixed
     */
    public function handler()
    {
        return view('partials.header.category', [
            'types' => $this->types,
            'chunk' => $this->chunk,
        ]);
    }
}
