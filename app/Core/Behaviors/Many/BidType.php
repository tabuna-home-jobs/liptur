<?php namespace App\Core\Behaviors\Many;

use Orchid\Platform\Behaviors\Many;

class BidType extends Many
{

    /**
     * @var string
     */
    public $name = 'Заявки';

    /**
     * @var string
     */
    public $slug = 'bid';

    /**
     * @var bool
     */
    public $display = false;

    /**
     * @return array
     */
    public function fields(): array
    {
        return [
            'name' => 'tag:input|type:text|name:name|max:255|required|title:Название|help:Главный заголовок',

        ];
    }


    public function grid(): array
    {
        return [
            'name'       => 'Название',
            'publish_at' => 'Дата публикации',
            'created_at' => 'Дата создания',
        ];
    }
}
