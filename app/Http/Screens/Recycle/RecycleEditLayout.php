<?php

namespace App\Http\Screens\Recycle;

use Orchid\Screen\Builder;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\InputField;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Repository;

class RecycleEditLayout extends Rows
{
    public $query;

    /**
     * Views.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            InputField::make('post.id')
                ->disabled()
                ->title('Id'),

            InputField::make('post.type')
                ->disabled()
                ->max(255)
                ->title('Type'),

            InputField::make('post.slug')
                ->disabled()
                ->max(255)
                ->title('Slug'),
        ];
    }

    /**
     * @param $post
     *
     * @throws \Throwable
     *
     * @return array
     */
    public function build(Repository $post)
    {
        $this->query = $post;
        $form        = new Builder($this->fields($post), $post);

        return view($this->template, [
            'form' => $form->generateForm(),
        ])->render();
    }
}
