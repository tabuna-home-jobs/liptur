<?php

namespace App\Http\Screens\Recycle;

use Orchid\Platform\Fields\Builder;
use Orchid\Platform\Fields\Field;
use Orchid\Platform\Layouts\Rows;

class RecycleEditLayout extends Rows
{
    public $query;

    /**
     * Views.
     *
     * @return array
     */
    public function dfields(): array
    {
        //$this->query->getContent('shortvar')->set('value','111');
        //dd($this->query++);

        $fields = [
            'id'	=> Field::tag('input')
                ->name('post.id')
                ->disabled()
                ->title('Id'),

            'type'	=> Field::tag('input')
                ->name('post.type')
                ->disabled()
                ->max(255)
                ->title('Type'),

            'slug'	=> Field::tag('input')
                ->name('post.slug')
                ->disabled()
                ->max(255)
                ->title('Slug'),
        ];

        return $fields;
    }

    /**
     * @param $post
     *
     * @throws \Throwable
     *
     * @return array
     */
    public function build($post)
    {
        $this->query = $post;
        $form = new Builder($this->dfields($post), $post);

        return view($this->template, [
            'form' => $form->generateForm(),
        ])->render();
    }
}
