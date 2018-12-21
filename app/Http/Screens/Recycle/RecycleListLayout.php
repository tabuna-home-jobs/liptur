<?php

namespace App\Http\Screens\Recycle;

use Orchid\Platform\Layouts\Table;
use Orchid\Platform\Platform\Fields\TD;

class RecycleListLayout extends Table
{
    /**
     * @var string
     */
    public $data = 'posts';

    /**
     * @return array
     */
    public function fields() : array
    {
        return  [

            TD::name('id')
                ->title('Id')
                ->setRender(function ($post) {
                    return '<a href="'.route('dashboard.systems.recycle.edit',
                            $post->id).'">'.$post->id.'</a>';
                }),
            TD::name('type')
                ->title('Тип поста')
                ->setRender(function ($post) {
                    return '<a href="'.route('dashboard.systems.recycle.edit',
                            $post->id).'">'.$post->type.'</a>';
                }),
            TD::name('slug')
                ->title('Slug поста')
                ->setRender(function ($post) {
                    return '<a href="'.route('dashboard.systems.recycle.edit',
                            $post->id).'" title="'.$post->slug.'">'.str_limit($post->slug, 50).'</a>';
                }),
            TD::name('deleted_at')
                ->title('Дата удаления'),
        ];
    }
}
