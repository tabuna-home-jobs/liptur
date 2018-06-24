<?php

namespace App\Http\Controllers\Other;

use App\Core\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use willvincent\Rateable\Rating;

class RatingController extends Controller
{

    /**
     * @param Post    $post
     * @param Request $request
     *
     * @return float|int
     */
    public function store(Post $post, Request $request)
    {
        if (!Auth::check()) {
            return [
                'title'   => 'Ошибка',
                'message' => 'Что бы влиять на рейтинг необходимо авторизоваться',
                'type'    => 'error',
            ];
        }

        $rating = Rating::where('rateable_type', Post::class)
            ->where('user_id', Auth::id())
            ->where('rateable_id', $post->id)
            ->first();

        if (is_null($rating)) {
            $rating = new Rating;
            $rating->rating = $request->get('rating');
            $rating->user_id = Auth::id();
            $post->ratings()->save($rating);
        } else {

            $rating->rating = $request->get('rating');
            $rating->save();
        }

        $options = $post->options;
        $options['rating'] = round($post->averageRating(), 2);
        $post->options = $options;
        $post->save();

        return [
            'title'   => 'Спасибо',
            'message' => 'Мы отобразим ваше впечаетление в рейтинге',
            'type'    => 'success',
        ];

    }
}
