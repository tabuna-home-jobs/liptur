<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class subscription.
 */
class Subscription extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subscriptions';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'lang',
    ];
}
