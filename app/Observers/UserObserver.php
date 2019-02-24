<?php

namespace App\Observers;

use App\Notifications\MainWelcomeNotification;

class UserObserver
{
    /**
     * @param $user
     */
    public function created($user)
    {
        $user->notify(new MainWelcomeNotification($user));
    }
}
