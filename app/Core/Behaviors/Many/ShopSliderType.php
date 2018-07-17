<?php

namespace App\Core\Behaviors\Many;

use App\Http\Forms\Shop\ProductBaseForm;
use Orchid\Platform\Behaviors\Many;
use Orchid\Platform\Fields\Field;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;
use Orchid\Platform\Platform\Fields\TD;

/**
 * Class ShopSliderType.
 */
class ShopSliderType extends Many
{
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
            'id' => 'sometimes|integer|unique:posts',
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

            Field::tag('input')
                ->type('text')
                ->name('name')
                ->max(255)
                ->title('Титл слайдера'),

            Field::tag('wysiwyg')
                ->name('body')
                ->title('Аннотация слайдера'),

            Field::tag('input')
                ->type('text')
                ->name('price')
                ->title('Цена текст'),

            Field::tag('input')
                ->type('text')
                ->name('link')
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
                'name' => 'Russian',
                'script' => 'Cyrl',
                'dir' => 'ltr',
                'native' => 'Русский',
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
