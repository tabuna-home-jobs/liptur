<?php

namespace App\Http\Filters\Hotel;

use Illuminate\Database\Eloquent\Builder;
use Orchid\Platform\Filters\Filter;

class TypeFilter extends Filter
{
    /**
     * @param Builder $builder
     *
     * @return Builder
     */
    public function run(Builder $builder): Builder
    {
    }

    public function html()
    {
    }
}
