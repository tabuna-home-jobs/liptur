<?php

namespace App\Orchid\Entities\Many;

use App\Fields\RegionField;
use App\Http\Forms\Posts\Options;
use App\Traits\ManyTypeTrait;
use Illuminate\Support\Facades\App;
use Orchid\Platform\Http\Forms\Posts\BasePostForm;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;
use Orchid\Press\Entities\Many;
use Orchid\Screen\Fields\DateTimerField;
use Orchid\Screen\Fields\InputField;
use Orchid\Screen\Fields\MapField;
use Orchid\Screen\TD;


class ATMType extends Many
{
    use ManyTypeTrait;

    /**
     * @var string
     */
    public $name = 'Банкомат';

    /**
     * @var string
     */
    public $slug = 'atm';

    /**
     * @var string
     */
    public $icon = 'fa fa-credit-card';

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
            'id'              => 'sometimes|integer|unique:posts',
            'content.ru.name' => 'required|string',
        ];
    }


    /**
     * @return array
     */
    public function fields(): array
    {
        return [
            'name'     => InputField::make('name')
                ->type('text')
                ->max(255)
                ->title('Название')
                ->help('Главный заголовок'),
            'open'     => DateTimerField::make('open')
                ->title('Дата открытия')
                ->help('Открытие мероприятия состоиться'),
            'region'   => RegionField::make('region')
                ->title('Регион'),
            'distance' => InputField::make('distance')
                ->type('number')
                ->title('Удалённость от Липецка')
                ->help('Отсчёт с центра города (Почтамп)')
                ->placeholder(0),
            'close'    => DateTimerField::make('close')
                ->title('Дата закрытия'),
            'place'    => MapField::make('place')
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
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function display()
    {
        return collect([
            'name'   => 'Банкоматы',
            'icon'   => 'icon-lip-credit-card',
            'svg'    => '/dist/svg/maps/atm.svg',
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
        return [
        ];
    }
}
