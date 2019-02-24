<?php

namespace App\Core\Models;

//use Illuminate\Database\Eloquent\Model;
use Orchid\Platform\Core\Models\Setting;
use Orchid\Platform\Traits\MultiLanguageTrait;

class Shortvar extends Setting
{
    use MultiLanguage;

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
