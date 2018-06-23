<?php namespace App\Http\Forms\Posts;

use Orchid\Forms\Form;
use Orchid\Platform\Core\Models\Post;

class Template extends Form
{
    /**
     * @var string
     */
    public $name = 'Шаблон';

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
        if (is_null($post)) {
            $post = new Post();
        }

        return view('forms.category', [
            'post' => $post,
        ]);
    }
}
