<?php

namespace App\Http\Forms\Posts;

use App\Models\Post;
use Orchid\Platform\Forms\Form;

class Category extends Form
{
    /**
     * @var string
     */
    public $name = 'Черты';

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
        $category = collect(config('category.'.$type->slug))->sort();

        if (is_null($post)) {
            $post = new Post();
        }

        return view('forms.category', [
            'category'       => $category,
            'post'           => $post,
            'selectCategory' => $post->getOption('category', []),
            'selectKitchens' => $post->getOption('kitchens', []),
        ]);
    }
}
