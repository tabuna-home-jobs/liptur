<?php

namespace App\Core\Behaviors\Many;

use App\Http\Forms\Posts\Options;
use Orchid\Platform\Behaviors\Many;
use Orchid\Platform\Http\Forms\Posts\BasePostForm;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;
use Orchid\Platform\Platform\Fields\TD;

class RefillType extends Many
{
    /**
     * @var string
     */
    public $name = 'Заправки';

    /**
     * @var string
     */
    public $slug = 'refill';

    /**
     * @var string
     */
    public $icon = 'fa fa-car';

    /**
     * @var string
     */
    public $image = '/img/category/hostel.jpg';

    /**
     * Slug url /news/{name}.
     *
     * @var string
     */
    public $slugFields = 'name';

    /**
     * @var bool
     */
    public $category = false;

    /**
     * Display global maps.
     *
     * @var bool
     */
    public $maps = true;

    /**
     * Rules Validation.
     *
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
            'name'  => 'tag:input|type:text|name:name|max:255|required|title:Название|help:Главный заголовок',
            'place' => 'tag:place|type:text|name:place|max:255|required|title:Место положение|help:Адрес на карте',

            'region'   => 'tag:region|name:region|title:Регион',
            'distance' => 'tag:input|type:number|name:distance|title:Удалённость от Липецка|help:Отсчёт с центра города (Почтамп)|placeholder:0',
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
            'name'   => 'Заправки',
            'icon'   => 'icon-lip-refill',
            'svg'    => '/dist/svg/maps/bus.svg',
            'mapUrl' => false,
            'time'   => false,
        ]);
    }

    /**
     * @return string
     */
    public function route(): string
    {
        return 'item';
    }
}
