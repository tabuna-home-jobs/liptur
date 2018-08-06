<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    public function user()
    {
        return $this->belongsTo(\App\Core\Models\User::class);
    }
}
