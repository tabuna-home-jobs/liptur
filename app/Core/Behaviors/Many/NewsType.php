<?php

namespace App\Core\Behaviors\Many;

use App\Http\Filters\Titz\TitzFilter;
use App\Http\Forms\Posts\Options;
use Orchid\Platform\Behaviors\Many;
use Orchid\Platform\Http\Filters\CreatedFilter;
use Orchid\Platform\Http\Filters\SearchFilter;
use Orchid\Platform\Http\Filters\StatusFilter;
use Orchid\Platform\Http\Forms\Posts\BasePostForm;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;

class NewsType extends Many
{
    /**
     * @var string
     */
    public $name = 'Новости';

    /**
     * @var string
     */
    public $description = 'Базовый тип новости';

    /**
     * @var string
     */
    public $slug = 'news';

    /**
     * @var string
     */
    public $icon = 'fa fa-newspaper-o';

    /**
     * @var string
     */
    public $image = '/img/tour/background/events.jpg';

    /**
     * Slug url /news/{name}.
     *
     * @var string
     */
    public $slugFields = 'name';

    /**
     * HTTP data filters.
     *
     * @var array
     */
    public $filters = [
        SearchFilter::class,
        StatusFilter::class,
        CreatedFilter::class,
        TitzFilter::class,
    ];

    /**
     * Rules Validation.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id'                    => 'sometimes|integer|unique:posts',
            'content.*.name'        => 'required|string',
            'content.*.body'        => 'required|string',
            'content.*.title'       => 'required|string|max:255',
            'content.*.description' => 'required|string|max:255',
        ];
    }

    /**
     * @return array
     */
    public function fields(): array
    {
        return [
            'name'        => 'tag:input|type:text|name:name|max:255|required|title:Название|help:Главный заголовок',
            'body'        => 'tag:wysiwyg|name:body|max:255|required|rows:10',
            'source'      => 'tag:input|type:url|name:source|title:Источник статьи|help:Ссылка не индексируется',
            'title'       => 'tag:input|type:text|name:title|max:255|required|title:Заголовок статьи|help:Вверхней части странице',
            'description' => 'tag:textarea|name:description|max:255|required|rows:5|title:Краткое описание',
            'keywords'    => 'tag:tags|name:keywords|max:255|required|title:Ключевые слова|help:Записывайте через запятую',

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
     * @return \Illuminate\Support\Collection
     */
    public function display()
    {
        return collect([
            'name' => 'Новости',
            'icon' => '',
            'time' => false,
        ]);
    }

    /**
     * @return string
     */
    public function route(): string
    {
        return 'new';
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
