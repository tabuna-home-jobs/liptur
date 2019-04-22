<?php

namespace App\Http\Widgets;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use App\Models\Post;
use Orchid\Widget\Widget;

class AdvertisingWidget extends Widget
{
    /**
     * @var static
     */
    protected $date;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->date = Carbon::now();
    }

    /**
     * @param string $key
     *
     * @return null
     */
    public function handler($key = '')
    {
       return \Cache::remember('widget-advertising-'.App::getLocale().'-'.$key, 60, function () use ($key) {

            $post = Post::type('advertising')
                ->where('options->locale->' . App::getLocale(), 'true')
                ->where('options->category', $key)
                ->where('options->startDate', '<', $this->date)
                ->where('options->endDate', '>', $this->date)
                ->first();

            if (!is_null($post)) {
                return $post->getContent('code');
            } else {
                return '';
            }
       });

    }
}
