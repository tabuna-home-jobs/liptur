<?php

namespace App\Models;

use Orchid\Setting\Setting;
use Orchid\Platform\Traits\MultiLanguageTrait;

class Shortvar extends Setting
{
    use MultiLanguageTrait;

    protected $fillable = [
        'key',
        'value',
        'options',
    ];

    protected $casts = [
        'key'     => 'string',
        'value'   => 'array',
        'options' => 'array',
    ];
}
