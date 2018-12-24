<?php

namespace App\Http\Screens\Basetojpg;

use Orchid\Platform\Layouts\Table;
use Orchid\Platform\Platform\Fields\TD;

class BasetojpgTermLayout extends Table
{
    /**
     * @var string
     */
    public $data = 'terms';

    /**
     * @return array
     */
    public function fields() : array
    {
        return  [

            TD::name('id')
                ->title('Id')
                ->setRender(function ($post) {
                    return '<a href="'.route('dashboard.systems.basetojpg.edit',
                            [$post->id,'2']).'">'.$post->id.'</a>';
                }),
            TD::name('type')
                ->title('Тип поста')
                ->setRender(function ($post) {
                    return '<a href="'.route('dashboard.systems.basetojpg.edit',
                            [$post->id,'2']).'">'.$post->type.'</a>';
                }),
            TD::name('slug')
                ->title('Slug поста')
                ->setRender(function ($post) {
                    return '<a href="'.route('dashboard.systems.basetojpg.edit',
                            [$post->id,'2']).'" title="'.$post->slug.'">'.str_limit($post->slug, 50).'</a>';
                }),


            TD::name('lenght')
                ->title('Длина поста')
                ->setRender(function ($post) {
                    return mb_strlen(serialize((array)$post->content), '8bit');
                    //return strlen(utf8_decode(join("",$post->content)));
                }),
            TD::name('image')
                ->title('Длина поста')
                ->setRender(function ($post) {
                    if (strpos(serialize((array)$post->content), 'data:image') !== false) {
                        return '1';
                    } else {
                        return '0';
                    }
                }),

            TD::name('created_at')
                ->title('Дата создания'),
        ];
    }
}
