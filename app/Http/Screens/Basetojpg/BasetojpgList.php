<?php

namespace App\Http\Screens\Basetojpg;

use App\Core\Models\Post;
use Illuminate\Http\Request;
use Orchid\Platform\Screen\Link;
use Orchid\Platform\Screen\Screen;

class BasetojpgList extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Список постов';
    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Список постов';

    /**
     * Query data.
     *
     * @return array
     */
    public function query() : array
    {
        return [
            'posts' => Post::paginate(30),
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
            BasetojpgListLayout::class,
        ];
    }

}
