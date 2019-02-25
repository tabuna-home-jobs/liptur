<?php

namespace App\Orchid\Entities\Many;

use App\Http\Forms\Shop\ProductBaseForm;
use App\Traits\ManyTypeTrait;
use Orchid\Platform\Fields\Field;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;
use Orchid\Press\Entities\Many;
use Orchid\Screen\Fields\InputField;
use Orchid\Screen\Fields\TinyMCEField;
use Orchid\Screen\TD;

/**
 * Class ShopSliderType.
 */
class ShopSliderType extends Many
{
    use ManyTypeTrait;
    /**
     * @var string
     */
    public $name = 'Слайдер магазина';
    /**
     * @var string
     */
    public $description = 'Информация для главного слайдера магазина';
    /**
     * @var string
     */
    public $slug = 'shopslider';

    /**
     * @var bool
     */
    public $display = false;

    /**
     * Slug url.
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
                ->title('Титл слайдера'),

            TinyMCEField::make('body')
                ->title('Аннотация слайдера')
                ->theme('modern'),

            InputField::make('price')
                ->type('text')
                ->title('Цена текст'),

            InputField::make('link')
                ->type('text')
                ->title('Ссылка на страницу'),

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
        ];
    }


}
