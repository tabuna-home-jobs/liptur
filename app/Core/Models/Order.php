<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

use Orchid\Platform\Core\Traits\MultiLanguage;

/**
 * Class subscription.
 */
class Order extends Model
{
    
    use MultiLanguage;
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'order';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'options',
    ];

    /**
     * @var array
     */
    protected $casts = [
      'options' => 'array',
    ];
}
