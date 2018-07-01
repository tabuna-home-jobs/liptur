<?php

namespace App\Http\Forms\Shop;

use Orchid\Platform\Fields\Field;
use Orchid\Platform\Platform\Fields\TD;

class CategoryTemplate
{
    /**
     * @var int
     */
    public $chunk = 4;

    /**
     * Rules Validation.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'content.*.name' => 'required|string',
            'content.*.body' => 'required|string',
        ];
    }

    /**
     * HTTP data filters.
     *
     * @return array
     */
    public function filters() : array
    {
        return [];
    }

    /**
     * @throws \Orchid\Platform\Exceptions\TypeException
     *
     * @return array
     */
    public function fields() : array
    {
        return [

            Field::tag('picture')
                ->name('smallPicture')
                ->title('Маленькое изображение раздела')
                ->help('Изображение характеризующее раздел')
                ->width(150)
                ->height(150),

            Field::tag('picture')
                ->name('fullPicture')
                ->title('Фоновое отображение раздела')
                ->help('Изображение характеризующее раздел')
                ->width('100%')
                ->height(150),

            Field::tag('input')
                ->type('text')
                ->name('name')
                ->max(255)
                ->require()
                ->title(trans('dashboard::systems/category.fields.name_title'))
                ->help(trans('dashboard::systems/category.fields.name_help')),

            Field::tag('wysiwyg')
                ->name('body')
                ->max(255)
                ->require()
                ->title(trans('dashboard::systems/category.fields.body_title')),
        ];
    }

    /**
     * Grid View for post type.
     */
    public function grid() : array
    {
        return [
            TD::name('created_at')
                ->title(trans('dashboard::systems/category.date_creation')),
        ];
    }
}
