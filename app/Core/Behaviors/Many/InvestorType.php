<?php namespace App\Core\Behaviors\Many;

use Orchid\Platform\Behaviors\Many;
use Orchid\Platform\Http\Forms\Posts\BasePostForm;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;

class InvestorType extends Many
{

    /**
     * @var string
     */
    public $name = 'Предложения инвесторам';

    /**
     * @var string
     */
    public $slug = 'investor';

    /**
     * @var string
     */
    public $icon = 'fa fa-dollar';

    /**
     * @var string
     */
    public $image = '/img/tour/background/events.jpg';

    /**
     * Slug url /news/{name}.
     * @var string
     */
    public $slugFields = 'name';

    /**
     * @var bool
     */
    public $divider = true;

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
        ];
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
