<?php

namespace App\Core\Behaviors\Many;

use App\Http\Filters\Common\RegionFilters;
use App\Http\Filters\Gastronomy\CategoryFilters;
use App\Http\Forms\Posts\Category;
use App\Http\Forms\Posts\Options;
use Orchid\Platform\Behaviors\Many;
use Orchid\Platform\Http\Filters\CreatedFilter;
use Orchid\Platform\Http\Filters\SearchFilter;
use Orchid\Platform\Http\Filters\StatusFilter;
use Orchid\Platform\Http\Forms\Posts\BasePostForm;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;

class RestaurantsType extends Many
{
    /**
     * @var string
     */
    public $name = 'Гастрономия';


    public $description = 'Рестораны, кафе, бары';

    /**
     * @var string
     */
    public $slug = 'gastronomy';

    /**
     * @var string
     */
    public $icon = 'fa fa-cutlery';

    /**
     * @var string
     */
    public $image = '/img/category/gastronomy.jpg';

    /**
     * Slug url /news/{name}.
     * @var string
     */
    public $slugFields = 'name';

    /**
     * @var bool
     */
    public $category = true;

    /**
     * Display global maps
     * @var bool
     */
    public $maps = true;

    /**
     * @var array
     */
    public $filters = [
        SearchFilter::class,
        StatusFilter::class,
        CreatedFilter::class,

        RegionFilters::class,
        CategoryFilters::class,
        //DistanceFilters::class,
    ];

    /**
     * Rules Validation.
     * @return array
     */
    public function rules(): array
    {
        return [
            'id'             => 'sometimes|integer|unique:posts',
            'content.*.name' => 'required|string',
            'content.*.body' => 'required|string',
        ];
    }

    /**
     * @return array
     */
    public function fields(): array
    {
        return [
            'name' => 'tag:input|type:text|name:name|max:255|required|title:Название|help:Главный заголовок',
            'body' => 'tag:wysiwyg|name:body|max:255|required|rows:10',

            'phone' => 'tag:input|type:text|name:phone|max:255|required|title:Номер телефона|help:Записывается в свободной форме',
            'price' => 'tag:input|type:text|name:price|max:255|required|title:Средний чек|help:Записывается в свободной форме',
            'site'  => 'tag:input|type:url|name:site|title:Официальный сайт',


            'region'   => 'tag:region|name:region|title:Регион',
            'distance' => 'tag:input|type:number|name:distance|title:Удалённость от Липецка|help:Отсчёт с центра города (Почтамп)|placeholder:0',

            'open'  => 'tag:datetime|type:text|name:open|max:255|required|title:Дата открытия|help:Будет учитываться только время',
            'close' => 'tag:datetime|type:text|name:close|max:255|required|title:Дата закрытия|help:Будет учитываться только время',
            'place' => 'tag:place|type:text|name:place|max:255|required|title:Место положение|help:Адрес на карте',

            'title'       => 'tag:input|type:text|name:title|max:255|required|title:Заголовок статьи|help:Упоменение',
            'description' => 'tag:textarea|name:description|max:255|required|rows:5|title:Краткое описание',
            'keywords'    => 'tag:tags|name:keywords|max:255|required|title:Ключевые слова|help:Упоменение',
            'robot'       => 'tag:robot|name:robot|max:255|required|title:Индексация|help:Разрешить поисковым роботам индесацию страницы',
        ];
    }

    /**
     * Grid View for post type.
     */
    public function grid(): array
    {
        return [
            'name'       => 'Название',
            'publish_at' => 'Дата публикации',
            'created_at' => 'Дата создания',
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
            Category::class,
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function display()
    {
        return collect([
            'name' => 'Гастрономия',


            'title'       => 'Гастрономия Липецкой области',
            'description' => 'Рестораны, кафе, бары Липецкой области',
            'icon'        => 'icon-lip-caffe',
            'svg'         => '/dist/svg/maps/gastronomy.svg',
            'mapUrl'      => true,
            'time'        => false,
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
     * Basic statuses possible for the object
     *
     * @return array
     */
    public function status()
    {
        return [
            'publish' => 'Опубликовано',
            'draft'   => 'Черновик',
            'titz'    => 'Тиц',
        ];
    }
}
