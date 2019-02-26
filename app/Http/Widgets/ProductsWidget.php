<?php

namespace App\Http\Widgets;

use Orchid\Widget\Widget;
use App\Models\Post;
use Illuminate\Support\Facades\App;

class ProductsWidget extends Widget
{
    public $query = null;

    /**
     * @var null
     */
    public $key = null;

    /**
     * @return array
     */
    public function handler()
    {
        $query = Post::type('product')
            ->select('id', 'content->ru->title as text')
            ->where('status', '<>', 'hidden')
            ->where('options->count', '>', 0)
        ;

        if(!empty($this->query)) {
            $query->where('content->'.App::getLocale().'->name', 'like',  "%$this->query%");
        }

        $products = $query->get();

        return $products->map(function($item) {
            return [
                'id' => $item['id'],
                'text'=> stripslashes($item['text'])
            ];
        });

    }

}