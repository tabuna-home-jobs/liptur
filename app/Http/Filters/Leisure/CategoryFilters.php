<?php

namespace App\Http\Filters\Leisure;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Filters\MainCategoryFilters;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\InputField;

class CategoryFilters extends MainCategoryFilters
{
    public $slug =  'leisure';

}
