<?php

namespace App\Orchid\Entities\Many;

use App\Traits\ManyTypeTrait;
use Orchid\Platform\Http\Forms\Posts\BasePostForm;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;
use Orchid\Press\Entities\Many;
use Orchid\Screen\Fields\InputField;
use Orchid\Screen\Fields\TagsField;
use Orchid\Screen\Fields\UploadField;
use Orchid\Screen\TD;


class DocsType extends Many
{
    use ManyTypeTrait;

    /**
     * @var string
     */
    public $name = 'Документы';

    /**
     * @var string
     */
    public $description = 'Предназначены для скачивания пользователем';

    /**
     * @var string
     */
    public $slug = 'docs';

    /**
     * @var bool
     */
    public $display = false;

    /**
     * @var string
     */
    public $icon = 'fa fa-download';

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
            InputField::make('name')
                ->type('text')
                ->max(255)
                ->title('Название')
                ->help('Главный заголовок'),
        ];
    }

    /**
     * Grid View for post type.
     */
    public function grid(): array
    {
        return [

            TD::set('name', 'Название')
                ->linkPost('name')
                ->width(500),
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
     * @return string
     */
    public function route(): string
    {
        return 'item';
    }


    /**
     * @return array
     * @throws \Orchid\Screen\Exceptions\TypeException
     * @throws \Throwable
     */
    public function main(): array
    {
        return array_merge(parent::main(), [

            TagsField::make('tags')
                ->title('Tags')
                ->help('Keywords'),
            UploadField::make('attachment')
                ->title('Upload DropBox'),
        ]);
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
