<?php

namespace App\Orchid\Entities\Many;

use App\Traits\ManyTypeTrait;

use App\Http\Forms\Posts\Options;
use Orchid\Press\Entities\Many;
use Orchid\Platform\Http\Forms\Posts\BasePostForm;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;
use Orchid\Screen\TD;

use Orchid\Screen\Fields\InputField;
use Orchid\Screen\Fields\TinyMCEField;
use Orchid\Screen\Fields\MapField;
use App\Fields\RegionField;
use Orchid\Screen\Fields\TextAreaField;
use Orchid\Screen\Fields\TagsField;

class BusStationType extends Many
{
    use ManyTypeTrait;
    /**
     * @var string
     */
    public $name = 'Автовокзал';

    /**
     * @var string
     */
    public $slug = 'bus-station';

    /**
     * @var string
     */
    public $icon = 'fa fa-bus';

    /**
     * @var string
     */
    public $image = '/img/category/hostel.jpg';

    /**
     * Slug url /news/{name}.
     *
     * @var string
     */
    public $slugFields = 'name';

    /**
     * @var bool
     */
    public $category = false;

    /**
     * Display global maps.
     *
     * @var bool
     */
    public $maps = true;

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
     * @return array
     */
    public function fields(): array
    {
        return [
            InputField::make('name')
                ->type('text')
                ->max(255)
                ->title('Название')
                ->help('Главный заголовок'),
            TinyMCEField::make('body')
                ->max(255)
                ->rows(10)
                ->theme('modern'),
            MapField::make('place')
                ->max(255)
                ->title('Место положение')
                ->help('Адрес на карте'),
            InputField::make('phone')
                ->type('text')
                ->max(255)
                ->title('Номер телефона')
                ->help('Записывается в свободной форме'),
            InputField::make('site')
                ->type('url')
                ->title('Официальный сайт'),
            RegionField::make('region')
                ->title('Регион'),
            InputField::make('distance')
                ->type('number')
                ->title('Удалённость от Липецка')
                ->help('Отсчёт с центра города (Почтамп)')
                ->placeholder(0),
            InputField::make('title')
                ->type('text')
                ->max(255)
                ->title('Заголовок статьи')
                ->help('Упоменение'),
            TextAreaField::make('description')
                ->max(255)
                ->rows(5)
                ->title('Краткое описание'),
            TagsField::make('keywords')
                ->max(255)
                ->title('Ключевые слова')
                ->help('Упоменение'),

        ];
    }

    /**
     * Grid View for post type.
     */
    public function grid(): array
    {
        return [
            TD::set('name', 'Название')
                ->linkPost('name'),
            TD::set('publish_at', 'Дата публикации'),
            TD::set('created_at', 'Дата создания'),
        ];
    }

    /**
     * @return array
     */
    public function modules()
    {
        return [
            BasePostForm::class,
            UploadPostForm::class,
            Options::class,
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function display()
    {
        return collect([
            'name' => 'Автовокзал',
            'icon' => 'icon-lip-bus',
            'svg' => '/dist/svg/maps/bus.svg',
            'mapUrl' => true,
            'time' => false,
        ]);
    }

    /**
     * @return string
     */
    public function route(): string
    {
        return 'item';
    }

    /**
     * Basic statuses possible for the object.
     *
     * @return array
     */
    public function status(): array
    {
        return [
            'publish' => 'Опубликовано',
            'draft' => 'Черновик',
            'titz' => 'Тиц',
        ];
    }

    /**
     * @return array
     * @throws \Throwable
     */
    public function options(): array
    {
        return [];
    }
}
