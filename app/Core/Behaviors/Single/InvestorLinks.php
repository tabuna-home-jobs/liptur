<?php

namespace App\Core\Behaviors\Single;

use Orchid\Platform\Behaviors\Single;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;

class InvestorLinks extends Single
{
    /**
     * @var string
     */
    public $name = 'Наши инвесторы';

    /**
     * @var string
     */
    public $slug = 'investor-links';

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
            'title'       => 'tag:input|type:text|name:title|max:255|title:Article Title',
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
}
