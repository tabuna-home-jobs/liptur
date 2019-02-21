<?php

namespace App\Orchid\Entities\Single;

use Orchid\Press\Entities\Single;

class ShippingAndPayment extends Single
{
    /**
     * @var string
     */
    public $name = 'Доставка и оплата';

    /**
     * @var string
     */
    public $slug = 'shipping-and-payment';

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

    /**
     * @return array
     * @throws \Throwable
     */
    public function options(): array
    {
        return [];
    }
}
