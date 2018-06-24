<?php

namespace App\Core\Behaviors\Many;

use App\Http\Forms\Posts\Options;
use Orchid\Platform\Behaviors\Many;
use Orchid\Platform\Http\Forms\Posts\BasePostForm;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;

class GrangesType extends Many
{
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
     * @var string
     */
    public $slugFields = 'name';

    /**
     * Display global maps
     * @var bool
     */
    public $maps = true;

    /**
     * @var bool
     */
    public $category = true;

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
            'name'  => 'tag:input|type:text|name:name|max:255|required|title:Название|help:Главный заголовок',
            'body'  => 'tag:wysiwyg|name:body|max:255|required|rows:10',
            'title' => 'tag:input|type:text|name:title|max:255|required|title:Заголовок статьи|help:Упоменение',

            'region'   => 'tag:region|name:region|title:Регион',
            'distance' => 'tag:input|type:number|name:distance|title:Удалённость от Липецка|help:Отсчёт с центра города (Почтамп)|placeholder:0',
            'place'    => 'tag:place|type:text|name:place|max:255|required|title:Место положение|help:Адрес на карте',


            'description' => 'tag:textarea|name:description|max:255|required|rows:5|title:Краткое описание',
            'keywords'    => 'tag:tags|name:keywords|max:255|required|title:Ключевые слова|help:Упоменение',

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


            'title'       => 'Усадьбы Липецкой области',
            'description' => 'Справочник усадеб Липецкой области: заметки, фотографии, информация',


            'icon'   => 'icon-lip-temple',
            'svg'    => '/dist/svg/maps/temple.svg',
            'mapUrl' => true,
            'time'   => false,
        ]);
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
