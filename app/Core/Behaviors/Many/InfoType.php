<?php

namespace App\Core\Behaviors\Many;

use App\Http\Forms\Posts\Options;
use Orchid\Platform\Behaviors\Many;
use Orchid\Platform\Http\Forms\Posts\BasePostForm;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;
use Orchid\Platform\Platform\Fields\TD;

class InfoType extends Many
{
    /**
     * @var string
     */
    public $name = 'Информация';

    /**
     * @var string
     */
    public $description = 'Полезная информация';

    /**
     * @var string
     */
    public $slug = 'info';

    /**
     * Slug url /news/{name}.
     *
     * @var string
     */
    public $slugFields = 'name';

    /**
     * @var string
     */
    public $icon = 'fa fa-info-circle';

    /**
     * @var string
     */
    public $image = '/img/category/info.jpg';

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
            'name'   => 'tag:input|type:text|name:name|max:255|title:Название|help:Главный заголовок',
            'body'   => 'tag:wysiwyg|name:body|max:255|rows:10',
            'source' => 'tag:input|type:url|name:source|title:Источник статьи|help:Ссылка не индексируется',

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
            'name'   => 'Полезная информация',
            'icon'   => 'icon-lip-passport',
            'mapUrl' => false,
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
