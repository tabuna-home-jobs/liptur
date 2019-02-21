<?php

namespace App\Http\Forms\Posts;

use Orchid\Press\Models\Post;
use Orchid\Platform\Forms\Form;

class Options extends Form
{
    /**
     * @var string
     */
    public $name = 'Опции';

    /**
     * Display Base Options.
     *
     * @param null      $type
     * @param Post|null $post
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function get($type = null, Post $post = null)
    {
        $icon = collect(config('icon.attributes'))->sort();

        $options = $post ? $post->options : [];
        if (array_key_exists('option', $options)) {
            $options = $options['option'];
        }

        return view('forms.options', [
            'options' => $options,
            'icons'   => $icon,
        ]);
    }
}
