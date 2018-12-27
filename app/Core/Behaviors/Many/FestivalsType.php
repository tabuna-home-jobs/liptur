<?php

namespace App\Core\Behaviors\Many;

use App\Http\Filters\Cfo\CfoFilter;
use App\Http\Filters\Common\DateFilters;
use App\Http\Filters\Common\RegionFilters;
use App\Http\Filters\Titz\TitzFilter;
use App\Http\Forms\Posts\Options;
use Auth;
use Orchid\Platform\Behaviors\Many;
use Orchid\Platform\Http\Filters\CreatedFilter;
use Orchid\Platform\Http\Filters\SearchFilter;
use Orchid\Platform\Http\Filters\StatusFilter;
use Orchid\Platform\Http\Forms\Posts\BasePostForm;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;
use Orchid\Platform\Platform\Fields\TD;

class FestivalsType extends Many
{
    /**
     * @var string
     */
    public $name = 'Фестивали';

    /**
     * @var string
     */
    public $slug = 'festivals';

    /**
     * Slug url /news/{name}.
     *
     * @var string
     */
    public $slugFields = 'name';

    /**
     * @var string
     */
    public $icon = 'fa fa-motorcycle';

    /**
     * @var string
     */
    public $image = '/img/tour/background/events.jpg';

    /**
     * @var bool
     */
    public $category = true;

    /**
     * @var array
     */
    public $views = [
        'pages.item'  => 'Обычная запись',
        'pages.event' => 'Главное мероприятие',
    ];

    /**
     * @var array
     */
    public function filters() : array
    {
        return [
            SearchFilter::class,
            StatusFilter::class,
            CreatedFilter::class,
            TitzFilter::class,
            CfoFilter::class,

            RegionFilters::class,
            //DistanceFilters::class,
            DateFilters::class,

        ];
    }

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
        if (Auth::user()->inRole('cfo')) {
            return [
                'name'  => 'tag:input|type:text|name:name|max:255|title:Название|help:Главный заголовок',
                'body'  => 'tag:wysiwyg|name:body|max:255|rows:10|theme:modern',
                'open'  => 'tag:datetime|type:text|name:open|max:255|title:Дата открытия|help:Открытие мероприятия состоиться',
                'close' => 'tag:datetime|type:text|name:close|max:255|title:Дата закрытия',

                'phone'     => 'tag:input|type:text|name:phone|max:255|title:Номер телефона|help:Записывается в свободной форме',
                'price'     => 'tag:input|type:text|name:price|max:255|title:Стоимость|help:Записывается в свободной форме',
                'site'      => 'tag:input|type:url|name:site|title:Официальный сайт',
                'organizer' => 'tag:input|type:text|name:organizer|title:Организатор',

                'type-event' => 'tag:input|type:text|name:type-event|max:255|title:Тип событийного мероприятия|help:Я не знаю, зачем это!',

                'region'   => 'tag:region|name:region|title:Регион',
                'distance' => 'tag:input|type:number|name:distance|title:Удалённость от Липецка|help:Отсчёт с центра города (Почтамп)|placeholder:0',

                'title'       => 'tag:input|type:text|name:title|max:255|title:Заголовок статьи|help:Упоменение',
                'description' => 'tag:textarea|name:description|max:255|rows:5|title:Краткое описание',
                'keywords'    => 'tag:tags|name:keywords|max:255|title:Ключевые слова|help:Упоменение',

            ];
        }

        return [
            'name'      => 'tag:input|type:text|name:name|max:255|title:Название|help:Главный заголовок',
            'body'      => 'tag:wysiwyg|name:body|max:255|rows:10',
            'open'      => 'tag:datetime|type:text|name:open|max:255|title:Дата открытия|help:Открытие мероприятия состоиться',
            'close'     => 'tag:datetime|type:text|name:close|max:255|title:Дата закрытия',
            'place'     => 'tag:place|type:text|name:place|max:255|title:Место положение|help:Адрес на карте',
            'phone'     => 'tag:input|type:text|name:phone|max:255|title:Номер телефона|help:Записывается в свободной форме',
            'price'     => 'tag:input|type:text|name:price|max:255|title:Стоимость|help:Записывается в свободной форме',
            'site'      => 'tag:input|type:url|name:site|title:Официальный сайт',
            'organizer' => 'tag:input|type:text|name:organizer|title:Организатор',

            'type-event' => 'tag:input|type:text|name:type-event|max:255|title:Тип событийного мероприятия|help:Я не знаю, зачем это!',

            'region'   => 'tag:region|name:region|title:Регион',
            'distance' => 'tag:input|type:number|name:distance|title:Удалённость от Липецка|help:Отсчёт с центра города (Почтамп)|placeholder:0',

            'title'       => 'tag:input|type:text|name:title|max:255|title:Заголовок статьи|help:Упоменение',
            'description' => 'tag:textarea|name:description|max:255|rows:5|title:Краткое описание',
            'keywords'    => 'tag:tags|name:keywords|max:255|title:Ключевые слова|help:Упоменение',

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
     * @return \Illuminate\Support\Collection
     */
    public function display()
    {
        return collect([
            'name'        => 'Фестивали',
            'title'       => __('Events Lipetsk region'),
            'description' => 'Интересные мероприятия области, посещения которых оставят только приятные впечатления',
            'icon'        => 'icon-lip-festival',
            'time'        => true,
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
     * render cfo statuses.
     *
     * @return array
     */
    public function renderCfoStatuses()
    {
        return [
            'draft' => 'Черновик',
            'cfo'   => 'ЦФО',
        ];
    }

    /**
     * Basic statuses possible for the object.
     *
     * @return array
     */
    public function status()
    {
        // if (Auth::user()->inRole('cfo')) {
        //     return $this->renderCfoStatuses();
        // }
        return [
            'publish' => 'Опубликовано',
            'draft'   => 'Черновик',
            'titz'    => 'Тиц',
            'cfo'     => 'ЦФО',
        ];
    }
}
