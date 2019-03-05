<?php

namespace App\Orchid\Entities\Many;

use App\Fields\RegionField;
use App\Http\Forms\Posts\Options;
use App\Traits\ManyTypeTrait;
use Illuminate\Support\Facades\App;
use Orchid\Platform\Http\Forms\Posts\BasePostForm;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;
use Orchid\Press\Entities\Many;
use Orchid\Screen\Fields\DateTimerField;
use Orchid\Screen\Fields\InputField;
use Orchid\Screen\Fields\MapField;
use Orchid\Screen\Fields\TagsField;
use Orchid\Screen\Fields\TextAreaField;
use Orchid\Screen\Fields\TinyMCEField;
use Orchid\Screen\TD;

class EventCalendarType extends Many
{
    use ManyTypeTrait;
    /**
     * @var string
     */
    public $name = 'Календарь событий';

    /**
     * @var string
     */
    public $description = 'Не изменяемый календарь событий';

    /**
     * @var string
     */
    public $slug = 'event_calendar';

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
    public $icon = 'fa fa-bullhorn';

    /**
     * @var string
     */
    public $image = '/img/category/event_calendar.jpg';

    /**
     * @var string
     */
    public $listing = 'listings.catalog-event';

    /**
     * Rules Validation.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id'                     => 'sometimes|integer|unique:posts',
            'content.ru.name'        => 'required|string',
            'content.ru.body'        => 'required|string',
            'content.ru.title'       => 'required|string|max:255',
            'content.ru.description' => 'required|string|max:255',
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
            DateTimerField::make('open')
                ->max(255)
                ->title('Дата открытия')
                ->help('Открытие мероприятия состоиться'),
            DateTimerField::make('close')
                ->max(255)
                ->title('Дата закрытия'),
            InputField::make('source')
                ->type('url')
                ->title('Источник статьи')
                ->help('Ссылка не индексируется'),
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
            InputField::make('organizer')
                ->type('text')
                ->title('Организатор'),
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
                ->help('Записывайте через запятую'),

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
            'name'   => 'События',
            'icon'   => 'icon-lip-exibition',
            'time'   => true,
            'mapUrl' => false,
        ]);
    }

    /**
     * @return array
     * @throws \Throwable
     */
    public function options(): array
    {
        return $this->getIconOptions();
    }
}
