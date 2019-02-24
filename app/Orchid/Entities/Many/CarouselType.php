<?php

namespace App\Orchid\Entities\Many;

use App\Traits\ManyTypeTrait;

use Orchid\Press\Entities\Many;
use Orchid\Platform\Http\Forms\Posts\BasePostForm;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;
use Orchid\Screen\TD;

use Orchid\Screen\Fields\InputField;
use Orchid\Screen\Fields\TextAreaField;

class CarouselType extends Many
{
    use ManyTypeTrait;
    /**
     * @var string
     */
    public $name = 'Главная карусель';

    /**
     * @var string
     */
    public $slug = 'carousel';

    /**
     * @var string
     */
    public $icon = 'fa fa-object-group';

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
     * Rules Validation.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => 'sometimes|integer|unique:posts',
            'content.ru.name' => 'required|string',
            'content.ru.url' => 'required|string',
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
            InputField::make('url')
                ->type('url')
                ->title('Ссылка на страницу'),
            TextAreaField::make('description')
                ->max(255)
                ->rows(5)
                ->title('Краткое описание'),
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
     * @return array
     * @throws \Throwable
     */
    public function options(): array
    {
        return [];
    }
}
