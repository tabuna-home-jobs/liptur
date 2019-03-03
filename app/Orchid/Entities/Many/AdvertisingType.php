<?php

namespace App\Orchid\Entities\Many;

use App\Fields\RegionField;
use App\Http\Forms\Posts\Category;
use App\Http\Forms\Posts\Options;
use App\Traits\ManyTypeTrait;
use Illuminate\Support\Facades\App;
use Orchid\Platform\Http\Forms\Posts\BasePostForm;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;
use Orchid\Press\Entities\Many;
use Orchid\Press\Http\Filters\CreatedFilter;
use Orchid\Press\Http\Filters\SearchFilter;
use Orchid\Press\Http\Filters\StatusFilter;
use Orchid\Screen\Fields\DateTimerField;
use Orchid\Screen\Fields\InputField;
use Orchid\Screen\Fields\SelectField;
use Orchid\Screen\Fields\CodeField;
use Orchid\Screen\TD;

class AdvertisingType extends Many
{
    //use ManyTypeTrait;
    /**
     * @var string
     */
    public $name = 'Рекламные блоки';

    /**
     * @var string
     */
    public $slug = 'advertising';

    /**
     * @var bool
     */
    public $display = false;

    /**
     * @var string
     */
    public $icon = 'fa fa-bell-o';

    /**
     * @var string
     */
    public $image = '/img/category/agencie.jpg';

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
     * @var array
     */
    public function filters(): array
    {
        return [
            SearchFilter::class,
            StatusFilter::class,
            CreatedFilter::class,
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
            'content.ru.code' => 'required|string',
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
            CodeField::make('code')
                ->title('Код'),
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
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function display()
    {
        return [
        ];
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
        ];
    }

    /**
     * @return array
     * @throws \Throwable
     */
    public function options(): array
    {
        return [
            SelectField::make('category')
                ->options(config('category.advertising'))
                ->title('Категория'),
            DateTimerField::make('startDate')
                ->title('Начало периода'),
            DateTimerField::make('endDate')
                ->title('Конец периода'),
        ];
    }
}
