<?php

namespace App\Orchid\Entities\Many;

use App\Fields\RegionField;
use App\Http\Forms\Posts\Options;
use App\Traits\ManyTypeTrait;
use Illuminate\Support\Facades\App;
use Orchid\Platform\Http\Forms\Posts\BasePostForm;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;
use Orchid\Press\Entities\Many;
use Orchid\Screen\Fields\InputField;
use Orchid\Screen\Fields\MapField;
use Orchid\Screen\Fields\TagsField;
use Orchid\Screen\Fields\TextAreaField;
use Orchid\Screen\Fields\TinyMCEField;
use Orchid\Screen\TD;

class GrangesType extends Many
{
    use ManyTypeTrait;
    /**
     * @var string
     */
    public $name = 'Усадьбы';

    /**
     * @var string
     */
    public $slug = 'granges';

    /**
     * @var string
     */
    public $icon = 'fa fa-home';

    /**
     * @var string
     */
    public $image = '/img/category/granges.jpg';

    /**
     * Slug url /news/{name}.
     *
     * @var string
     */
    public $slugFields = 'name';

    /**
     * Display global maps.
     *
     * @var bool
     */
    public $maps = true;

    /**
     * @var bool
     */
    public $category = true;

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
            InputField::make('title')
                ->type('text')
                ->max(255)
                ->title('Заголовок статьи')
                ->help('Упоменение'),

            InputField::make('guide')
                ->type('url')
                ->title('Ссылка на аудиогид'),

            RegionField::make('region')
                ->title('Регион'),
            InputField::make('distance')
                ->type('number')
                ->title('Удалённость от Липецка')
                ->help('Отсчёт с центра города (Почтамп)')
                ->placeholder(0),
            MapField::make('place')
                ->max(255)
                ->title('Место положение')
                ->help('Адрес на карте'),

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
                ->column('content.' . App::getLocale() . '.name')
                ->filter('text')
                ->sort()
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
     * @return string
     */
    public function route(): string
    {
        return 'item';
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function display()
    {
        return collect([
            'name' => 'Усадьбы',

            'title'       => __('Sight Lipetsk region'),
            'description' => 'Справочник усадеб Липецкой области: заметки, фотографии, информация',

            'icon'   => 'icon-lip-temple',
            'svg'    => '/dist/svg/maps/temple.svg',
            'mapUrl' => true,
            'time'   => false,
        ]);
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
            'draft'   => 'Черновик',
            'titz'    => 'Тиц',
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
