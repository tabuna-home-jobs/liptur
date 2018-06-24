<?php

namespace App\Http\Widgets;

use Auth;
use Orchid\Platform\Widget\Widget;

class ReservationWidget extends Widget
{
    /**
     * @return mixed
     */
    public function run($data = '')
    {
        if (isset($data['postid']) && $data['postid'] > 0) {
            if (Auth::check()) {
                $data['reservation']['user_id'] = Auth::id();
                $data['reservation']['date'] = date('Y-m-d');
                $data['reservation']['postid'] = $data['postid'];

                return view('partials.reservation.reservation', $data);
            }
        }
    }
}
