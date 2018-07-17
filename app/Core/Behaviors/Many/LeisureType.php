<?php

namespace App\Core\Behaviors\Many;

use App\Http\Filters\Common\RegionFilters;
use App\Http\Filters\Leisure\CategoryFilters;
use App\Http\Filters\Titz\TitzFilter;
use App\Http\Forms\Posts\Category;
use App\Http\Forms\Posts\Options;
use Illuminate\Support\Facades\Auth;
use Orchid\Platform\Behaviors\Many;
use Orchid\Platform\Http\Filters\CreatedFilter;
use Orchid\Platform\Http\Filters\SearchFilter;
use Orchid\Platform\Http\Filters\StatusFilter;
use Orchid\Platform\Http\Forms\Posts\BasePostForm;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;
use Orchid\Platform\Platform\Fields\TD;

class LeisureType extends Many
{
    /**
     * @var string
     */
    public $slug = 'leisure';
    /**
     * @var string
     */
    public $icon = 'fa fa-hand-peace-o';
    /**
     * @var string
     */
    public $image = '/img/category/leisure.jpg';
    /**
     * Slug url /news/{name}.
     *
     * @var string
     */
    public $slugFields = 'name';
    /**
     * @var bool
     */
    public $category = true;
    /**
     * @var string
     */
    public $groupname = 'Главные разделы';
    /**
     * @var array
     */
    public $filters = [
        SearchFilter::class,
        StatusFilter::class,
        CreatedFilter::class,
        TitzFilter::class,

        RegionFilters::class,
        CategoryFilters::class,
        //DistanceFilters::class,
    ];

    public function __construct()
    {
        unset($this->name);
        unset($this->display);
    }

    public function __get($name)
    {
        if ($name == 'name') {
            return $this->getName();
        }
        if ($name == 'display') {
            $this->setName();

            return true;
        }
    }

    private function getName()
    {
        $user = Auth::user();

        if ($user && $user->inRole('titz')) {
            return 'Досуг';
        }

        return 'Активный отдых';
    }

    private function setName()
    {
        $this->name = $this->getName();
    }

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
    public function fields(): array
    {
        $this->setName();

        return [
            'name' => 'tag:input|type:text|name:name|max:255|title:Название|help:Главный заголовок',
            'body' => 'tag:wysiwyg|name:body|max:255|rows:10',

            'place' => 'tag:place|type:text|name:place|max:255|title:Место положение|help:Адрес на карте',
            'phone' => 'tag:input|type:text|name:phone|max:255|title:Номер телефона|help:Записывается в свободной форме',
            'site'  => 'tag:input|type:url|name:site|title:Официальный сайт',
            'email' => 'tag:input|type:email|name:email|title:Электронная почта',

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
        $this->setName();

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
            Category::class,
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function display()
    {
        return collect([
            'name' => 'Активный отдых',
            'icon' => 'icon-lip-festivites',
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
    public function status()
    {
        $this->setName();

        return [
            'publish' => 'Опубликовано',
            'draft'   => 'Черновик',
            'titz'    => 'Тиц',
        ];
    }
}
