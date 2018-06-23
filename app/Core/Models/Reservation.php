<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    /**
     * @var string
     */
    protected $table = 'reservation';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'post_id',
        'quantity',
        'date',
        'created_at',
        'updated_at'
    ];
}
