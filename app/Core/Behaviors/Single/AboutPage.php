<?php

namespace App\Core\Behaviors\Single;

use App\Http\Forms\Posts\BaseFormPage;
use Orchid\Platform\Behaviors\Single;

class AboutPage extends Single
{
    /**
     * @var string
     */
    public $name = 'Об области';

    /**
     * @var string
     */
    public $description = 'Презентационная страницы';

    /**
     * @var string
     */
    public $slug = 'about';

    /**
     * Rules Validation.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id'                    => 'sometimes|integer|unique:posts',
            'content.*.name'        => 'required|string',
            'content.*.title'       => 'required|string|max:255',
            'content.*.description' => 'required|string|max:255',
            'content.*.slideOne'    => 'required|string|max:255',
        ];
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

            'name'        => 'tag:input|type:text|name:name|max:255|required|title:Название|help:Главный заголовок',
            'slideOne'    => 'tag:textarea|name:slideOne|rows:5|title:Слайд 1|title:Текст для слайда 1',
            'slideTwo'    => 'tag:textarea|name:slideTwo|rows:5|title:Слайд 2|title:Текст для слайда 2',
            'slideThree'  => 'tag:textarea|name:slideThree|rows:5|title:Слайд 3|title:Текст для слайда 3',
            'slideFour'   => 'tag:textarea|name:slideFour|rows:5|title:Слайд 4|title:Текст для слайда 4',
            'slideFive'   => 'tag:textarea|name:slideFive|rows:5|title:Слайд 5|title:Текст для слайда 5',
            'slideSix'    => 'tag:textarea|name:slideSix|rows:5|title:Слайд 6|title:Текст для слайда 6',
            'slideSeven'  => 'tag:textarea|name:slideSeven|rows:5|title:Слайд 7|title:Текст для слайда 7',
            'slideEight'  => 'tag:textarea|name:slideEight|rows:5|title:Слайд 8|title:Текст для слайда 8',
        ];
    }

    /**
     * @return array
     */
    public function modules()
    {
        return [
            BaseFormPage::class,

        ];
    }
}
