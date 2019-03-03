<?php

declare(strict_types=1);

namespace App\Http\Layouts\ShopCategory;

use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\InputField;
use Orchid\Screen\Fields\SelectField;
use Orchid\Screen\Fields\TinyMCEField;
use Orchid\Screen\Fields\PictureField;

class ShopCategoryEditLayout extends Rows
{
    /**
     * Views.
     *
     * @return array
     * @throws \Throwable
     */
    public function fields(): array
    {
        $categoryContent = 'category.term.content.'.app()->getLocale();

        return [
            PictureField::make($categoryContent.'.smallPicture')
                ->title('Маленькое изображение раздела')
                ->help('Изображение характеризующее раздел')
                ->width(150)
                ->height(150),

            PictureField::make($categoryContent.'.fullPicture')
                ->title('Фоновое отображение раздела')
                ->help('Изображение характеризующее раздел')
                ->width('100%')
                ->height(150),

            InputField::make($categoryContent.'.name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Category name'))
                ->placeholder(__('Category name'))
                ->help(__('Category title')),

            InputField::make('category.term.slug')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Slug')),

            SelectField::make('category.parent_id')
                ->options(function () {
                    $options = $this->query->getContent('catselect');

                    return array_replace([0=> __('Without parent')], $options);
                })
                ->title(__('Parent Category')),

            TinyMCEField::make($categoryContent.'.body')
                ->title(__('Description'))
                ->theme('modern'),

        ];
    }
}
