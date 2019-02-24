<?php

namespace App\Orchid\Entities\Many;

use App\Traits\ManyTypeTrait;

use Orchid\Press\Entities\Many;
use Orchid\Platform\Http\Forms\Posts\BasePostForm;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;
use Orchid\Screen\TD;

use Orchid\Screen\Fields\InputField;
use Orchid\Screen\Fields\TinyMCEField;
use Orchid\Screen\Fields\MapField;

class ContactType extends Many
{
    use ManyTypeTrait;
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
            'id' => 'sometimes|integer|unique:posts',
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
            InputField::make('name')
                ->type('text')
                ->max(255)
                ->title('Название')
                ->help('Главный заголовок'),
            TinyMCEField::make('body')
                ->max(255)
                ->rows(10)
                ->theme('modern'),
            MapField::make('place')
                ->max(255)
                ->title('Место положение')
                ->help('Адрес на карте'),

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
     * @return \Illuminate\Support\Collection
     */
    public function display()
    {
        return collect([
            'name' => 'Контакты в регионах',
            'title' => 'Контакты в регионах',
            'description' => 'Контакты в регионах',
            'icon' => 'icon-lip-hotel',
            'svg' => '/dist/svg/maps/hostels.svg',
            'mapUrl' => false,
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
     * @return array
     * @throws \Throwable
     */
    public function options(): array
    {
        return [];
    }
}
