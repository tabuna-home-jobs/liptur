<?php

namespace App\Http\Forms\Posts;


use Orchid\Platform\Forms\Form;
use Orchid\Platform\Core\Models\Post;

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