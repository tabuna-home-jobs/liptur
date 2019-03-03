<?php

namespace App\Orchid\Entities\Single;

use Orchid\Press\Entities\Single;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;
use Orchid\Screen\Fields\InputField;
use App\Traits\ManyTypeTrait;

class CarouselLinks extends Single
{
    use ManyTypeTrait;
    /**
     * @var string
     */
    public $name = 'Полезные ссылки';

    /**
     * @var string
     */
    public $slug = 'carousel-links';

    /**
     * @var bool
     */
    public $display = false;


    /**
     * @var string
     */
    public $icon = 'fa fa-picture-o';

    /**
     * @return array
     */
    public function fields(): array
    {
        return [
            InputField::make('title')
                ->type('text')
                ->max(255)
                ->title('Article Title'),
        ];
    }

    /**
     * @return array
     */
    public function modules()
    {
        return [
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
