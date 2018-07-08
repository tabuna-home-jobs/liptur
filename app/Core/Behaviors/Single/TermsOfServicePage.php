<?php

namespace App\Core\Behaviors\Single;

use Orchid\Platform\Behaviors\Single;

class TermsOfServicePage extends Single
{
    /**
     * @var string
     */
    public $name = 'Правила сервиса';

    /**
     * @var string
     */
    public $slug = 'terms-of-service';


    /**
     * Rules Validation.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id'             => 'sometimes|integer|unique:posts',
            'content.*.name' => 'required|string',
            'content.*.body' => 'required|string',
        ];
    }

    /**
     * @return array
     */
    public function fields(): array
    {
        return [
            'name'  => 'tag:input|type:text|name:name|max:255|required|title:Название|help:Заголовок',
            'body'  => 'tag:wysiwyg|name:body|required|rows:30',
        ];
    }

    /**
     * @return array
     */
    public function modules(): array
    {
        return [];
    }
}
