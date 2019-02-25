<?php

namespace App\Orchid\Entities\Single;

use Orchid\Press\Entities\Single;
use Orchid\Screen\Fields\InputField;
use Orchid\Screen\Fields\TinyMCEField;
use App\Traits\ManyTypeTrait;

class PersonalData extends Single
{
    use ManyTypeTrait;
    /**
     * @var string
     */
    public $name = 'Персональные данные';

    /**
     * @var string
     */
    public $slug = 'personal-data';

    /**
     * @var bool
     */
    public $display = false;

    /**
     * Rules Validation.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => 'sometimes|integer|unique:posts',
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
            InputField::make('name')
                ->type('text')
                ->max(255)
                ->required()
                ->title('Название')
                ->help('Заголовок'),
            TinyMCEField::make('body')
                ->max(255)
                ->rows(10)
                ->required()
                ->theme('modern'),
        ];
    }

    /**
     * @return array
     */
    public function modules(): array
    {
        return [];
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
