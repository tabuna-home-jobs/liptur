<?php

namespace App\Http\Screens\Shortvars;

use Orchid\Platform\Fields\Builder;
use Orchid\Platform\Fields\Field;
use Orchid\Platform\Layouts\Rows;

class ShortvarEditLayout extends Rows
{
    public $query;

    /**
     * Views.
     *
     * @return array
     */
    public function dfields(): array
    {
        //dd($this->query->getContent('shortvar'));

        $fields = [
            'key'		=> Field::tag('input')
                ->name('shortvar.key')
                ->required()
                ->max(255)
                ->title('Key slug'),

            'title'		=> Field::tag('input')
                ->name('shortvar.options.title')
                ->required()
                ->max(255)
                ->title('Title'),

            'desc'	=> Field::tag('textarea')
                ->name('shortvar.options.desc')
                ->row(5)
                ->title('Description'),

            'type' => Field::tag('select')
                ->options([
                    'input'    => 'Input',
                    'textarea' => 'Textarea',
                    'picture'  => 'Picture',
                    'tags'     => 'Tags',
                ])
                ->name('shortvar.options.type')
                ->title('Type'),
        ];

        //dd(json_encode($this->query->getContent('shortvar.value.value')));

        $type = $this->query->getContent('shortvar.options.type') ?? 'input';

        if (!is_null($this->query->getContent('shortvar.options.type'))) {
            $type = $this->query->getContent('shortvar.options.type');
        } elseif (is_array($this->query->getContent('shortvar.value'))) {
            $type = 'textarea';
        } else {
            $type = 'input';
        }

        switch ($type) {

            case 'picture':
                $fields['width'] = Field::tag('input')
                         ->name('shortvar.value.width')
                         ->title('Picture width');
                $fields['height'] = Field::tag('input')
                         ->name('shortvar.value.height')
                         ->title('Picture height');
                $fields['value'] = Field::tag('picture')
                         ->name('shortvar.value.value')
                         ->width($this->query->getContent('shortvar.value.width') ?? 500)
                         ->height($this->query->getContent('shortvar.value.height') ?? 300);
                break;
            default:
                $fields['value'] = Field::tag($type)
                 ->name('shortvar.value')
                 //->modifyValue(json_encode($this->query->getContent('shortvar.value')))
                 //->modifyName('shortvar.value')
                 //->modifyValue('Hello')
                 //->value('hello')
                 ->title('Value');
        }

        return $fields;
    }

    /**
     * @param $post
     *
     * @throws \Throwable
     *
     * @return array
     */
    public function build($post)
    {
        $this->query = $post;
        $form = new Builder($this->dfields($post), $post);

        return view($this->template, [
            'form' => $form->generateForm(),
        ])->render();
    }
}
