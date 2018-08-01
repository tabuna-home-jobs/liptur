<?php

declare(strict_types=1);

namespace App\Fields;

use Orchid\Platform\Fields\Field;

/**
 * Class TextAreaField.
 *
 * @method $this accesskey($value = true)
 * @method $this autofocus($value = true)
 * @method $this cols($value = true)
 * @method $this disabled($value = true)
 * @method $this form($value = true)
 * @method $this maxlength($value = true)
 * @method $this name($value = true)
 * @method $this placeholder($value = true)
 * @method $this readonly($value = true)
 * @method $this required($value = true)
 * @method $this rows($value = true)
 * @method $this tabindex($value = true)
 * @method $this wrap($value = true)
 */
class ArrayJsonField extends Field
{
    /**
     * @var string
     */
    public $view = 'fields.arrayjson';

     /**
     * Required Attributes.
     *
     * @var array
     */
    public $required = [
        'name',
    ];

    /**
     * Default attributes value.
     *
     * @var array
     */
    public $attributes = [
        'type' => 'hidden',
    ];

    /**
     * Attributes available for a particular tag.
     *
     * @var array
     */
    public $inlineAttributes = [
        'accept',
        'accesskey',
        'autocomplete',
        'autofocus',
        'checked',
        'disabled',
        'form',
        'formaction',
        'formenctype',
        'formmethod',
        'formnovalidate',
        'formtarget',
        'list',
        'max',
        'maxlength',
        'min',
        'multiple',
        'name',
        'pattern',
        'placeholder',
        'readonly',
        'required',
        'size',
        'src',
        'step',
        'tabindex',
        'type',
        'value',
    ];
}
