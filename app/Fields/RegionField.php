<?php

namespace App\Fields;

use Orchid\Platform\Fields\Field;

class RegionField extends Field
{
    /**
     * @var string
     */
    public $view = 'fields.region';

    /**
     * Default attributes value.
     *
     * @var array
     */
    public $attributes = [
        'class' => 'form-control',
    ];
    /**
     * Required Attributes.
     *
     * @var array
     */
    public $required = [
        'name',
    ];
    /**
     * Attributes available for a particular tag.
     *
     * @var array
     */
    public $inlineAttributes = [
        'accesskey',
        'autofocus',
        'disabled',
        'form',
        'multiple',
        'name',
        'required',
        'size',
        'tabindex',
    ];


    /**
     * @param null $attributes
     * @param null $data
     *
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */

    public function create($attributes, $data = null)
    {
        if (is_null($data)) {
            $data = collect();
        }

        $attributes->put('region', collect(config('region')));
        $attributes->put('data', $data);

        return view($this->view, $attributes);
    }
}