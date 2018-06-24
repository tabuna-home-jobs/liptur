<?php

namespace App\Core\Behaviors\Many;

use App\Http\Forms\Posts\Options;
use Orchid\Platform\Behaviors\Many;
use Orchid\Platform\Http\Forms\Posts\BasePostForm;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;

class PeopleType extends Many
{
    /**
     * @var string
     */
    public $name = 'Известные люди';

    /**
     * @var string
     */
    public $slug = 'people';

    /**
     * @var string
     */
    public $icon = 'fa fa-user-circle';

    /**
     * @var string
     */
    public $image = '/img/category/people.jpg';

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
            'name'        => 'tag:input|type:text|name:name|max:255|required|title:Название|help:Главный заголовок',
            'body'        => 'tag:wysiwyg|name:body|max:255|required|rows:10',
            'open'        => 'tag:datetime|type:text|name:open|max:255|required|title:Дата рождения|help:Время не учитывается',
            'close'       => 'tag:datetime|type:text|name:close|max:255|required|title:Дата смерти',
            'title'       => 'tag:input|type:text|name:title|max:255|required|title:Заголовок статьи|help:Упоменение',
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
     * @return \Illuminate\Support\Collection
     */
    public function display()
    {
        return collect([
            'name' => 'Известные люди',
            'icon' => 'icon-lip-famous_people',
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
