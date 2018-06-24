<?php

namespace App\Core\Behaviors\Single;

use Orchid\Platform\Behaviors\Single;

class InvestorPage extends Single
{
    /**
     * @var string
     */
    public $name = 'Инвесторам';

    /**
     * @var string
     */
    public $description = 'Потенциал области';

    /**
     * @var string
     */
    public $slug = 'investor';

    /**
     * Rules Validation.
     *
     * @return array
     */
    public function rules(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function fields(): array
    {
        return [
            'title'       => 'tag:input|type:text|name:title|max:255|required|title:Article Title|help:SEO title',
            'description' => 'tag:textarea|name:description|max:255|required|rows:5|title:Short description',
            'keywords'    => 'tag:tags|name:keywords|max:255|required|title:Keywords|help:SEO keywords',

        ];
    }

    /**
     * @return array
     */
    public function modules()
    {
        return [
            //UploadPostForm::class,
        ];
    }
}
