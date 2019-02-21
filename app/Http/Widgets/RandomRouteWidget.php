<?php

namespace App\Http\Widgets;

use App\Core\Models\Post;
use Illuminate\Support\Facades\Cache;
use Orchid\Widget\Widget;

class RandomRouteWidget extends Widget
{
    /**
     * @return mixed
     */
    public function handler()
    {
        $tour = Cache::remember('random-tour', 10, function () {
            $post = Post::where('type', 'tour')->inRandomOrder()->first();

            return [
                'rating' => $post != null ? round($post->averageRating(), 2) : 1,
                'post'   => $post,
            ];
        });

        return view('partials.main.randomtour', $tour);
    }
}
