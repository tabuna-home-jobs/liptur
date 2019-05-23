<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Platform\Traits\MultiLanguageTrait;
class Region extends Model
{
	use MultiLanguageTrait;
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'regions';
}
