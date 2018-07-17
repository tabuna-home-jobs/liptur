<?php

namespace App\Core\Behaviors\Many;

use App\Http\Forms\Shop\ProductBaseForm;
use Orchid\Platform\Behaviors\Many;
use Orchid\Platform\Fields\Field;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;
use Orchid\Platform\Platform\Fields\TD;

/**
 * Class Product.
 */
class ProductType extends Many
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
     * @var string
     */
    public $groupname = 'Интернет-магазин';

    /**
     * @var bool
     */
    public $display = true;

    /**
     * Rules Validation.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id'             => 'sometimes|integer|unique:posts',
            'content.ru.name' => 'required|string',
            'content.ru.body' => 'required|string',
        ];
    }

    /**
     * @return array
     */
    public function status(): array
    {
        return [
            'stock'   => 'В наличии',
            'order'   => 'Под заказ',
            'missing' => 'Отсутствует',
            'hidden'  => 'Скрытый',
        ];
    }

    /**
     * @throws \Orchid\Platform\Exceptions\TypeException
     *
     * @return array
     */
    public function fields(): array
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

            Field::tag('select')
                ->options([
                    '1' => 'Заранее занесённый список 1',
                    '2' => 'Заранее занесённый список 1',
                ])
                ->name('maintainer')
                ->title('Производитель товара'),

            Field::tag('input')
                ->type('text')
                ->name('seller.name')
                ->max(255)
                ->required()
                ->title('Имя продавца'),

            Field::tag('input')
                ->type('text')
                ->name('seller.phone')
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
     * @throws \Orchid\Platform\Exceptions\TypeException
     *
     * @return array
     */
    public function options(): array
    {
        return [

            Field::tag('input')
                ->type('number')
                ->name('options.width')
                ->required()
                ->title('Ширина'),

            Field::tag('input')
                ->type('number')
                ->name('options.height')
                ->required()
                ->title('Высота'),

            Field::tag('input')
                ->type('number')
                ->name('options.gravity')
                ->required()
                ->title('Вес'),

            Field::tag('input')
                ->type('number')
                ->name('options.price')
                ->required()
                ->title('Стоимость'),

            Field::tag('checkbox')
                ->name('options.new')
                ->title('Новинка')
                ->default(1),

            Field::tag('checkbox')
                ->name('options.special')
                ->title('Cпецпредложение')
                ->default(1),

            Field::tag('checkbox')
                ->name('options.warning')
                ->title('Обратите внимание')
                ->default(1),
        ];
    }

    /**
     * @return array
     */
    public function modules(): array
    {
        return [
            ProductBaseForm::class,
            UploadPostForm::class,
        ];
    }

    /**
     * @return array
     */
    public function locale(): array
    {
        return [
            'ru' => [
                'name'     => 'Russian',
                'script'   => 'Cyrl',
                'dir'      => 'ltr',
                'native'   => 'Русский',
                'regional' => 'ru_RU',
                'required' => true,
            ],
        ];
    }

    /**
     * Grid View for post type.
     */
    public function grid(): array
    {
        return [
            TD::name('name')
                ->title('Название'),
            TD::name('publish_at')
                ->title('Date of publication'),
            TD::name('created_at')
                ->title('Date of creation'),
        ];
    }
}
