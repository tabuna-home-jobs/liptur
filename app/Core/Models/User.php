<?php

namespace App\Core\Models;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Orchid\Platform\Core\Models\User as BaseUser;

class User extends BaseUser
{
    use Notifiable;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'permissions',
        'about',
        'phone',
        'sex',
        'subscription',
        'nickname',
        'website',
        'avatar',
        'address',
        'titz',
        'cfo',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'sex'          => 'boolean',
        'subscription' => 'boolean',
        'about'        => 'string',
        'permissions'  => 'array',
        'organization' => 'array',
        'titz'         => 'array',
        'cfo'          => 'array',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string $token
     *
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * @return mixed|string
     */
    public function getAvatar()
    {
        if (empty($this->avatar) || is_null($this->avatar)) {
            return '/img/no_avatar.png';
        }

        return $this->avatar;
    }

    public function routes()
    {
        return $this->hasMany('App\Core\Models\Route');
    }
}
