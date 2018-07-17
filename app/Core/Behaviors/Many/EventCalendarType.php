<?php

namespace App\Core\Behaviors\Many;

use App\Http\Forms\Posts\Options;
use Orchid\Platform\Behaviors\Many;
use Orchid\Platform\Http\Forms\Posts\BasePostForm;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;
use Orchid\Platform\Platform\Fields\TD;

class EventCalendarType extends Many
{
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
            'id'                    => 'sometimes|integer|unique:posts',
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
            'name'   => 'tag:input|type:text|name:name|max:255|title:Название|help:Главный заголовок',
            'body'   => 'tag:wysiwyg|name:body|max:255|rows:10',
            'open'   => 'tag:datetime|type:text|name:open|max:255|title:Дата открытия|help:Открытие мероприятия состоиться',
            'close'  => 'tag:datetime|type:text|name:close|max:255|title:Дата закрытия',
            'source' => 'tag:input|type:url|name:source|title:Источник статьи|help:Ссылка не индексируется',
            'place'  => 'tag:place|type:text|name:place|max:255|title:Место положение|help:Адрес на карте',

            'phone'     => 'tag:input|type:text|name:phone|max:255|title:Номер телефона|help:Записывается в свободной форме',
            'site'      => 'tag:input|type:url|name:site|title:Официальный сайт',
            'organizer' => 'tag:input|type:text|name:organizer|title:Организатор',

            'region'   => 'tag:region|name:region|title:Регион',
            'distance' => 'tag:input|type:number|name:distance|title:Удалённость от Липецка|help:Отсчёт с центра города (Почтамп)|placeholder:0',

            'title'       => 'tag:input|type:text|name:title|max:255|title:Заголовок статьи|help:Упоменение',
            'description' => 'tag:textarea|name:description|max:255|rows:5|title:Краткое описание',
            'keywords'    => 'tag:tags|name:keywords|max:255|title:Ключевые слова|help:Записывайте через запятую',

        ];
    }

    /**
     * Grid View for post type.
     */
    public function grid(): array
    {
        return [
            TD::name('name')->title('Название'),
            TD::name('publish_at')->title('Дата публикации'),
            TD::name('created_at')->title('Дата создания'),
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
}
