<?php namespace App\Core\Behaviors\Many;

use App\Http\Filters\Cfo\CfoFilter;
use App\Http\Filters\Titz\TitzFilter;
use Auth;
use Orchid\Platform\Behaviors\Many;
use Orchid\Platform\Http\Filters\CreatedFilter;
use Orchid\Platform\Http\Filters\SearchFilter;
use Orchid\Platform\Http\Filters\StatusFilter;
use Orchid\Platform\Http\Forms\Posts\BasePostForm;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;

class GalleryType extends Many
{

    /**
     * @var string
     */
    public $name = 'Фото Галлерея';

    /**
     * @var string
     */
    public $slug = 'gallery';

    /**
     * @var string
     */
    public $description = 'Альбомы Региона';

    /**
     * @var string
     */
    public $icon = 'icon-frame';

    /**
     * Slug url /news/{name}.
     * @var string
     */
    public $slugFields = 'name';

    /**
     * @var string
     */
    public $groupname = 'Другое';

    /**
     * HTTP data filters
     *
     * @var array
     */
    public $filters = [
        SearchFilter::class,
        StatusFilter::class,
        CreatedFilter::class,
        TitzFilter::class,
        CfoFilter::class,
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
        ];
    }

    /**
     * @return array
     */
    public function fields(): array
    {
        return [
            'name' => 'tag:input|type:text|name:name|max:255|required|title:Название|help:Название альбома',
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
        if (Auth::user()->inRole('cfo')) {
            return $this->renderCfoStatuses();
        }
        return [
            'publish' => 'Опубликовано',
            'draft'   => 'Черновик',
            'titz'    => 'Тиц',
            'cfo'     => 'ЦФО',
        ];
    }

    /**
     * render cfo statuses
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
}
