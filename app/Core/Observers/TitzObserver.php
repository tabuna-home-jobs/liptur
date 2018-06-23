<?php

namespace App\Core\Observers;

use Auth;

class TitzObserver
{
    /**
     * @param $post
     */
    public function creating($post)
    {
        if (Auth::check() && Auth::user()->inRole('titz')) {
            $post->status = 'titz';
        }
    }

    public function updating($post)
    {
        if (Auth::check() && Auth::user()->inRole('titz')) {
            $post->status = 'titz';
        }
    }
}
