<?php

namespace App\Orchid\Entities\Many;

use App\Traits\ManyTypeTrait;

use Orchid\Press\Entities\Many;
use Orchid\Platform\Http\Forms\Posts\BasePostForm;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;
use Orchid\Screen\TD;

use Orchid\Screen\Fields\InputField;
use Orchid\Screen\Fields\TinyMCEField;

class InvestorType extends Many
{
    use ManyTypeTrait;
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
     *
     * @var string
     */
    public $slugFields = 'name';

    /**
     * @var bool
     */
    public $divider = true;

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
        return [
            'publish' => 'Опубликовано',
            'draft' => 'Черновик',
            'titz' => 'Тиц',
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
