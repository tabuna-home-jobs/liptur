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
            InputField::name('post.id')
                ->disabled()
                ->title('Id'),

            InputField::name('post.type')
                ->disabled()
                ->max(255)
                ->title('Type'),

            InputField::name('post.slug')
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
        $form        = new Builder($this->dfields($post), $post);

        return view($this->template, [
            'form' => $form->generateForm(),
        ])->render();
    }
}
