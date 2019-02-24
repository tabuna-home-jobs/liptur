<?php

namespace App\Http\Screens\Recycle;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

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

            TD::set('id', 'Id')
                ->setRender(function ($post) {
                    return '<a href="'.route('dashboard.systems.recycle.edit',
                            $post->id).'">'.$post->id.'</a>';
                }),
            TD::set('type', 'Тип поста')
                ->setRender(function ($post) {
                    return '<a href="'.route('dashboard.systems.recycle.edit',
                            $post->id).'">'.$post->type.'</a>';
                }),
            TD::set('slug', 'Slug поста')
                ->setRender(function ($post) {
                    return '<a href="'.route('dashboard.systems.recycle.edit',
                            $post->id).'" title="'.$post->slug.'">'.str_limit($post->slug, 50).'</a>';
                }),
            TD::set('deleted_at', 'Дата удаления'),
        ];
    }
}
