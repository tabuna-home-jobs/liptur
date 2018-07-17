<?php

namespace App\Core\Behaviors\Many;

use App\Http\Forms\Posts\Options;
use Orchid\Platform\Behaviors\Many;
use Orchid\Platform\Http\Forms\Posts\BasePostForm;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;
use Orchid\Platform\Platform\Fields\TD;

class CinemaType extends Many
{
    /**
     * @var string
     */
    public $name = 'Кинотеатры';

    /**
     * @var string
     */
    public $slug = 'сinema';

    /**
     * Slug url /news/{name}.
     *
     * @var string
     */
    public $slugFields = 'name';

    /**
     * @var string
     */
    public $icon = 'fa fa-television';

    /**
     * @var string
     */
    public $image = '/img/category/сinema.jpg';

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
            'name' => 'tag:input|type:text|name:name|max:255|title:Название|help:Главный заголовок',
            'body' => 'tag:wysiwyg|name:body|max:255|rows:10',
            'open' => 'tag:datetime|type:text|name:open|max:255|title:Премьера',

            'place' => 'tag:place|type:text|name:place|max:255|title:Место положение|help:Адрес на карте',
            'phone' => 'tag:input|type:text|name:phone|max:255|title:Номер телефона|help:Записывается в свободной форме',
            'site'  => 'tag:input|type:url|name:site|title:Официальный сайт',

            'region'   => 'tag:region|name:region|title:Регион',
            'distance' => 'tag:input|type:number|name:distance|title:Удалённость от Липецка|help:Отсчёт с центра города (Почтамп)|placeholder:0',

            'title'       => 'tag:input|type:text|name:title|max:255|title:Заголовок статьи',
            'description' => 'tag:textarea|name:description|max:255|rows:5|title:Краткое описание',
            'keywords'    => 'tag:tags|name:keywords|max:255|title:Ключевые слова',

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
            'name' => 'Кинотеатры',
            'icon' => 'icon-lip-movie',
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
        return [
            'publish' => 'Опубликовано',
            'draft'   => 'Черновик',
            'titz'    => 'Тиц',
        ];
    }
}
