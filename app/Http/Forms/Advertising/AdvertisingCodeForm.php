<?php

namespace App\Http\Forms\Advertising;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;
use Orchid\Platform\Core\Models\Post;
use Orchid\Platform\Forms\Form;

class AdvertisingCodeForm extends Form
{
    /**
     * @var string
     */
    public $name = 'Код';

    /**
     * Base Model.
     *
     * @var
     */
    protected $model = Post::class;

    /**
     * AdvertisingCodeForm constructor.
     *
     * @param null $request
     */
    public function __construct($request = null)
    {
        parent::__construct($request);
    }

    /**
     * @param Post $adv
     *
     * @return \Illuminate\Contracts\View\Factory|View|\Illuminate\View\View
     *
     * @internal param $item
     */
    public function get(Post $adv = null): View
    {
        if (is_null($adv)) {
            $adv = new Post();
        }

        $config = collect(config('cms'));

        return view('dashboard.advertising.code', [
            'adv'        => $adv,
            'categories' => $config->get('advertising', []),
            'language'   => App::getLocale(),
            'locales'    => $config->get('locales', []),
        ]);
    }
}
