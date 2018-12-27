<?php

namespace App\Core\Behaviors\Many;

use App\Http\Forms\Posts\Options;
use Orchid\Platform\Behaviors\Many;
use Orchid\Platform\Http\Forms\Posts\BasePostForm;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;
use Orchid\Platform\Platform\Fields\TD;

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
            'name'  => 'tag:input|type:text|name:name|max:255|title:Название|help:Главный заголовок',
            'body'  => 'tag:wysiwyg|name:body|max:255|rows:10|theme:modern',
            'title' => 'tag:input|type:text|name:title|max:255|title:Заголовок статьи|help:Упоменение',

            'guide' => 'tag:input|type:url|name:guide|title:Ссылка на аудиогид',

            'region'   => 'tag:region|name:region|title:Регион',
            'distance' => 'tag:input|type:number|name:distance|title:Удалённость от Липецка|help:Отсчёт с центра города (Почтамп)|placeholder:0',
            'place'    => 'tag:place|type:text|name:place|max:255|title:Место положение|help:Адрес на карте',

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
    public function status()
    {
        return [
            'publish' => 'Опубликовано',
            'draft'   => 'Черновик',
            'titz'    => 'Тиц',
        ];
    }
}
