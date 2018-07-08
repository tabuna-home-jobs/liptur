<?php

namespace App\Core\Behaviors\Single;

use Orchid\Platform\Behaviors\Single;

class PersonalData extends Single
{
    /**
     * @var string
     */
    public $name = 'Персональные данные';

    /**
     * @var string
     */
    public $slug = 'personal-data';

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
