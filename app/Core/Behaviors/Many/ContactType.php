<?php

namespace App\Core\Behaviors\Many;

use Orchid\Platform\Behaviors\Many;
use Orchid\Platform\Http\Forms\Posts\BasePostForm;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;
use Orchid\Platform\Platform\Fields\TD;

class ContactType extends Many
{
    /**
     * @var string
     */
    public $name = 'Контакты в регионах';

    /**
     * @var string
     */
    public $slug = 'contact';

    /**
     * @var string
     */
    public $icon = 'fa fa-phone-square';

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
    public $maps = false;

    /**
     * Rules Validation.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id'             => 'sometimes|integer|unique:posts',
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
            'body'  => 'tag:wysiwyg|name:body|max:255|rows:10',
            'place' => 'tag:place|type:text|name:place|max:255|title:Место положение|help:Адрес на карте',
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
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function display()
    {
        return collect([
            'name'        => 'Контакты в регионах',
            'title'       => 'Контакты в регионах',
            'description' => 'Контакты в регионах',
            'icon'        => 'icon-lip-hotel',
            'svg'         => '/dist/svg/maps/hostels.svg',
            'mapUrl'      => false,
            'time'        => false,
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
