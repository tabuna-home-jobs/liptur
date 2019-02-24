<?php

namespace App\Orchid\Entities\Many;

use App\Traits\ManyTypeTrait;

use App\Http\Filters\Cfo\CfoFilter;
use App\Http\Filters\Titz\TitzFilter;
use Auth;
use Orchid\Press\Entities\Many;
use Orchid\Press\Http\Filters\CreatedFilter;
use Orchid\Press\Http\Filters\SearchFilter;
use Orchid\Press\Http\Filters\StatusFilter;
use Orchid\Platform\Http\Forms\Posts\BasePostForm;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;
use Orchid\Screen\TD;
use Orchid\Screen\Fields\InputField;


class GalleryType extends Many
{
    use ManyTypeTrait;
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
     *
     * @var string
     */
    public $slugFields = 'name';

    /**
     * @var string
     */
    public $groupname = 'Другое';

    /**
     * HTTP data filters.
     *
     * @var array
     */
    public function filters(): array
    {
        return [
            SearchFilter::class,
            StatusFilter::class,
            CreatedFilter::class,
            TitzFilter::class,
            CfoFilter::class,
        ];
    }

    /**
     * Rules Validation.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => 'sometimes|integer|unique:posts',
            'content.ru.name' => 'required|string',
        ];
    }

    /**
     * @return array
     */
    public function fields(): array
    {
        return [
            InputField::make('name')
                ->type('text')
                ->max(255)
                ->title('Название')
                ->help('Название альбома'),
        ];
    }

    /**
     * Grid View for post type.
     */
    public function grid(): array
    {
        return [
            TD::set('name', 'Название')
                ->linkPost('name'),
            TD::set('publish_at', 'Дата публикации'),
            TD::set('created_at', 'Дата создания'),
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
     * Basic statuses possible for the object.
     *
     * @return array
     */
    public function status(): array
    {
        if (Auth::user()
            ->inRole('cfo')
        ) {
            return $this->renderCfoStatuses();
        }

        return [
            'publish' => 'Опубликовано',
            'draft' => 'Черновик',
            'titz' => 'Тиц',
            'cfo' => 'ЦФО',
        ];
    }

    /**
     * render cfo statuses.
     *
     * @return array
     */
    public function renderCfoStatuses()
    {
        return [
            'draft' => 'Черновик',
            'cfo' => 'ЦФО',
        ];
    }

    /**
     * @return array
     * @throws \Throwable
     */
    public function options(): array
    {
        return [];
    }
}
