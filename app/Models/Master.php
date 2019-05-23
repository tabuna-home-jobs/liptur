<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

use Orchid\Platform\Traits\AttachTrait;
use Orchid\Platform\Traits\FilterTrait;
use Orchid\Platform\Traits\MultiLanguageTrait;
class Master extends Model
{
 use AttachTrait, MultiLanguageTrait, FilterTrait;
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'masters';
}
