<?php

namespace App\Http\Filters\RecrationCenter;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Filters\MainCategoryFilters;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\SelectField;

class CategoryFilters extends MainCategoryFilters
{
    public $slug =  'recration-center';

}
