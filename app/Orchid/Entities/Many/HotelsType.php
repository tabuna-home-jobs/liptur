<?php

namespace App\Orchid\Entities\Many;

use App\Fields\RegionField;
use App\Http\Filters\Common\RegionFilters;
use App\Http\Filters\Hotel\CategoryFilters;
use App\Http\Filters\Hotel\ServiceFilters;
use App\Http\Forms\Posts\Category;
use App\Http\Forms\Posts\Options;
use App\Traits\ManyTypeTrait;
use Illuminate\Support\Facades\App;
use Orchid\Platform\Http\Forms\Posts\BasePostForm;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;
use Orchid\Press\Entities\Many;
use Orchid\Press\Http\Filters\CreatedFilter;
use Orchid\Press\Http\Filters\SearchFilter;
use App\Http\Filters\StatusFilter;
use Orchid\Screen\Fields\DateTimerField;
use Orchid\Screen\Fields\InputField;
use Orchid\Screen\Fields\MapField;
use Orchid\Screen\Fields\TagsField;
use Orchid\Screen\Fields\TextAreaField;
use Orchid\Screen\Fields\TinyMCEField;
use Orchid\Screen\Fields\LabelField;
use Orchid\Screen\TD;
use Orchid\Screen\Field;

class HotelsType extends Many
{
    use ManyTypeTrait;
    /**
     * @var string
     */
    public $name = 'Где разместиться';

    /**
     * @var string
     */
    public $slug = 'hostel';

    /**
     * @var bool
     */
    public $display = false;

    /**
     * @var string
     */
    public $icon = 'fa fa-bed';

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
    public $category = true;

    /**
     * Display global maps.
     *
     * @var bool
     */
    public $maps = true;

    /**
     * @var array
     */
    public function filters(): array
    {
        return [
            SearchFilter::class,
            StatusFilter::class,
            CreatedFilter::class,

            RegionFilters::class,
            CategoryFilters::class,
            //DistanceFilters::class,
            //ServiceFilters::class,
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
            InputField::make('name')
                ->type('text')
                ->max(255)
                ->title('Название')
                ->help('Главный заголовок'),
            TinyMCEField::make('body')
                ->max(255)
                ->rows(10)
                ->theme('modern'),
            DateTimerField::make('open')
                ->max(255)
                ->title('Дата открытия')
                ->help('Открытие мероприятия состоиться'),
            DateTimerField::make('close')
                ->max(255)
                ->title('Дата закрытия'),

            MapField::make('place')
                ->max(255)
                ->title('Место положение')
                ->help('Адрес на карте'),
            InputField::make('phone')
                ->type('text')
                ->max(255)
                ->title('Номер телефона')
                ->help('Записывается в свободной форме'),
            InputField::make('site')
                ->type('url')
                ->title('Официальный сайт'),

            InputField::make('email')
                ->type('email')
                ->title('Электронная почта'),
            InputField::make('price')
                ->type('text')
                ->max(255)
                ->title('Стоимость')
                ->help('Записывается в свободной форме'),
            InputField::make('number-of-seats')
                ->type('numeric')
                ->title('Число мест')
                ->help('Записывается в свободной форме'),

            RegionField::make('region')
                ->title('Регион'),
            InputField::make('distance')
                ->type('number')
                ->title('Удалённость от Липецка')
                ->help('Отсчёт с центра города (Почтамп)')
                ->placeholder(0),

            InputField::make('booking')
                ->type('text')
                ->max(500)
                ->title('Booking.com')
                ->help('Ссылка без параметров на страницу сайта'),

            InputField::make('title')
                ->type('text')
                ->max(255)
                ->title('Заголовок статьи')
                ->help('Упоменение'),
            TextAreaField::make('description')
                ->max(255)
                ->rows(5)
                ->title('Краткое описание'),
            TagsField::make('keywords')
                ->max(255)
                ->title('Ключевые слова')
                ->help('Упоменение'),

        ];
    }

    /**
     * Grid View for post type.
     */
    public function grid(): array
    {
        return [

            TD::set('name', 'Название')
                ->column('content.' . App::getLocale() . '.name')
                ->filter('text')
                ->sort()
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
            Options::class,
            Category::class,
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function display()
    {
        return collect([
            'name'        => 'Где разместиться',
            'title'       => __('Hotels Lipetsk region'),
            'description' => 'Места размещения, для жителей и гостей региона',
            'icon'        => 'icon-lip-hotel',
            'svg'         => '/dist/svg/maps/hostels.svg',
            'mapUrl'      => true,
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

    /**
     * Basic statuses possible for the object.
     *
     * @return array
     */
    public function status(): array
    {
        return [
            'publish' => 'Опубликовано',
            'draft'   => 'Черновик',
            'titz'    => 'Тиц',
        ];
    }

    /**
     * @return array
     * @throws \Throwable
     */
    public function options(): array
    {
        return array_merge($this->getCategoryOptions(), $this->getIconOptions());
    }
}
