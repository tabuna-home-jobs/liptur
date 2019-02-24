<?php

namespace App\Http\Forms\Posts;

use App\Models\Post;
use Orchid\Platform\Forms\Form;

class RouteForm extends Form
{
    /**
     * @var string
     */
    public $name = 'Маршрут';

    public function get($type = null, Post $post = null)
    {
        $route = [];
        if (isset($post->content['route'])) {
            $route = $post->content['route'];
        }

        return view('forms.route-form', [
            'route' => json_encode($route),
        ]);
    }
}
