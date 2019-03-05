<?php

namespace App\Orchid\Entities\Many;

use App\Http\Forms\Shop\ProductBaseForm;
use App\Models\ShopCategory;
use App\Traits\ManyTypeTrait;
use Orchid\Platform\Fields\Field;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;
use Orchid\Press\Entities\Many;
use Orchid\Screen\Fields\CheckBoxField;
use Orchid\Screen\Fields\InputField;
use Orchid\Screen\Fields\SelectField;
use Orchid\Screen\Fields\TagsField;
use Orchid\Screen\Fields\TextAreaField;
use Orchid\Screen\Fields\TinyMCEField;
use Orchid\Screen\TD;


/**
 * Class Product.
 */
class ProductType extends Many
{
    use ManyTypeTrait;

    private function getCategories() {
        return ShopCategory::all();
    }
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
     * @var bool
     */
    public $display = false;
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
     * Rules Validation.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id'              => 'sometimes|integer|unique:posts',
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
            InputField::make('name')
                ->type('text')
                ->max(255)
                ->required()
                ->title('Название товара'),

            TextAreaField::make('annotation')
                ->max(180)
                ->row(5)
                ->required()
                ->title('Аннотация товара'),

            TinyMCEField::make('body')
                ->required()
                ->title('Описание товара')
                ->theme('modern'),

            InputField::make('title')
                ->type('text')
                ->max(255)
                ->required()
                ->title('Заголовок страницы'),

            TextAreaField::make('description')
                ->max(255)
                ->row(5)
                ->required()
                ->title('Описание страницы'),
            TagsField::make('keywords')
                ->title('Ключевые слова'),

            SelectField::make('maintainer')
                ->options([
                    '0' => 'Нет',
                    '1' => 'Производитель 1',
                    '2' => 'Производитель 2',
                ])
                ->title('Производитель товара'),

            InputField::make('seller.name')
                ->type('text')
                ->max(255)
                ->required()
                ->title('Имя продавца'),

            InputField::make('seller.phone')
                ->type('text')
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

            InputField::make('width')
                ->type('number')
                ->required()
                ->title('Ширина (см)'),

            InputField::make('length')
                ->type('number')
                ->required()
                ->title('Длинна (см)'),

            InputField::make('height')
                ->type('number')
                ->required()
                ->title('Высота (см)'),

            InputField::make('gravity')
                ->type('number')
                ->required()
                ->title('Вес (г)'),

            InputField::make('price')
                ->type('number')
                ->required()
                ->title('Стоимость'),

            InputField::make('count')
                ->name('count')
                ->type('number')
                ->readonly()
                ->title('Количество'),

            CheckBoxField::make('new')
                ->sendTrueOrFalse()
                ->title('Новинка'),

            CheckBoxField::make('special')
                ->sendTrueOrFalse()
                ->title('Cпецпредложение'),

            CheckBoxField::make('warning')
                ->sendTrueOrFalse()
                ->title('Обратите внимание'),
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


            TD::set('name', 'Название')
                ->filter('text')
                ->sort()
                ->linkPost('name'),
            TD::set('publish_at', 'Date of publication'),
            TD::set('created_at', 'Date of creation'),
            TD::set('options.count', 'Остаток')->setRender(function($item) {
                return $item->getOption('count');
            }),
        ];
    }

}
