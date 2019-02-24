<?php

namespace App\Orchid\Entities\Many;

use App\Http\Forms\Posts\Options;
use App\Traits\ManyTypeTrait;
use Illuminate\Support\Facades\App;
use Orchid\Platform\Http\Forms\Posts\BasePostForm;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;
use Orchid\Press\Entities\Many;
use Orchid\Screen\Fields\InputField;
use Orchid\Screen\Fields\TagsField;
use Orchid\Screen\Fields\TextAreaField;
use Orchid\Screen\Fields\TinyMCEField;
use Orchid\Screen\TD;

class InfoType extends Many
{
    use ManyTypeTrait;

    /**
     * @var string
     */
    public $name = 'Информация';
    /**
     * @var string
     */
    public $description = 'Полезная информация';
    /**
     * @var string
     */
    public $slug = 'info';
    /**
     * Slug url /news/{name}.
     *
     * @var string
     */
    public $slugFields = 'name';
    /**
     * @var string
     */
    public $icon = 'fa fa-info-circle';
    /**
     * @var string
     */
    public $image = '/img/category/info.jpg';

    /**
     * InfoType constructor.
     */
    public function __construct()
    {
        $this->name = __('Information');
    }

    /**
     * Rules Validation.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id'                     => 'sometimes|integer|unique:posts',
            'content.ru.name'        => 'required|string',
            'content.ru.body'        => 'required|string',
            'content.ru.title'       => 'required|string|max:255',
            'content.ru.description' => 'required|string|max:255',
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
            InputField::make('source')
                ->type('url')
                ->title('Источник статьи')
                ->help('Ссылка не индексируется'),

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
                ->help('Записывайте через запятую'),
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
     * @return string
     */
    public function route(): string
    {
        return 'item';
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function display()
    {
        return collect([
            'name'   => 'Полезная информация',
            'icon'   => 'icon-lip-passport',
            'mapUrl' => false,
            'time'   => false,
        ]);
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
        return [];
    }
}
