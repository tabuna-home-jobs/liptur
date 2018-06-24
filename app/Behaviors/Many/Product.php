<?php

namespace App\Behaviors\Many;

use Orchid\Platform\Behaviors\Many;
use Orchid\Platform\Fields\Field;
use Orchid\Platform\Http\Forms\Posts\BasePostForm;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;
use Orchid\Platform\Platform\Fields\TD;

/**
 * Class Product.
 */
class Product extends Many
{
    /**
     * @var string
     */
    public $name = 'Продукты';
    /**
     * @var string
     */
    public $description = 'Товары предлагаемые липецкой областью';
    /**
     * @var string
     */
    public $slug = 'product';
    /**
     * Slug url /news/{name}.
     *
     * @var string
     */
    public $slugFields = 'name';

    /**
     * Rules Validation.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'id'             => 'sometimes|integer|unique:posts',
            'content.*.name' => 'required|string',
            'content.*.body' => 'required|string',
        ];
    }

    /**
     * @throws \Orchid\Platform\Exceptions\TypeException
     *
     * @return array
     */
    public function fields() : array
    {
        return [
            Field::tag('input')
                ->type('text')
                ->name('name')
                ->max(255)
                ->required()
                ->title('Название товара'),

            Field::tag('textarea')
                ->name('annotation')
                ->max(180)
                ->row(5)
                ->required()
                ->title('Аннотация товара'),

            Field::tag('wysiwyg')
                ->name('body')
                ->required()
                ->title('Описание товара'),

            Field::tag('select')
                ->options([
                    '1' => 'Заранее занесённый список 1',
                    '2' => 'Заранее занесённый список 1',
                ])
                ->name('maintainer')
                ->title('Производитель товара'),

            Field::tag('input')
                ->type('numeric')
                ->name('width')
                ->required()
                ->title('Ширина'),
            Field::tag('input')
                ->type('numeric')
                ->name('height')
                ->required()
                ->title('Высота'),
            Field::tag('input')
                ->type('numeric')
                ->name('gravity')
                ->required()
                ->title('Вес'),

            Field::tag('checkbox')
                ->name('free')
                ->value(1)
                ->title('Free')
                ->placeholder('Event for free')
                ->help('Event for free'),

            Field::tag('input')
                ->type('text')
                ->name('title')
                ->max(255)
                ->required()
                ->title('Заголовок страницы'),
            Field::tag('textarea')
                ->name('description')
                ->max(255)
                ->row(5)
                ->required()
                ->title('Описание страницы'),
            Field::tag('tags')
                ->name('keywords')
                ->title('Ключевые слова'),

            Field::tag('input')
                ->type('text')
                ->name('title')
                ->max(255)
                ->required()
                ->title('Имя продавца'),
            Field::tag('input')
                ->type('text')
                ->name('phone')
                ->mask('(999) 999-9999')
                ->title('Телефон продавца'),
            /* need api key 'place'
            Field::tag('place')
                ->name('place')
                ->title('Place')
                ->help('place for google maps'),
            */
        ];
    }

    /**
     * @return array
     */
    public function modules() : array
    {
        return [
            BasePostForm::class,
            UploadPostForm::class,
        ];
    }

    /**
     * Grid View for post type.
     */
    public function grid() : array
    {
        return [
            TD::name('name')
                ->title('Name'),
            TD::name('publish_at')
                ->title('Date of publication'),
            TD::name('created_at')
                ->title('Date of creation'),
        ];
    }
}
