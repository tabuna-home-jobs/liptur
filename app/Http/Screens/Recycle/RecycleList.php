<?php

namespace App\Http\Screens\Recycle;

use App\Core\Models\Post;
use Illuminate\Http\Request;
use Orchid\Platform\Screen\Link;
use Orchid\Platform\Screen\Screen;

class RecycleList extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Корзина';
    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Список удаленных постов';

    /**
     * Query data.
     *
     * @return array
     */
    public function query() : array
    {
        return [
            'posts' => Post::onlyTrashed()->orderByDesc('deleted_at')->paginate(30),
        ];
    }

    /**
     * Views.
     *
     * @return array
     */
    public function layout() : array
    {
        return [
            RecycleListLayout::class,
        ];
    }

}