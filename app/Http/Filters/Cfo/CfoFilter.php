<?php

namespace App\Http\Filters\Cfo;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Orchid\Platform\Filters\Filter;

class CfoFilter extends Filter
{
    /**
     * @var bool
     */
    public $dashboard = true;

    /**
     * @param Builder $builder
     *
     * @return Builder
     */
    public function run(Builder $builder): Builder
    {
        $user = Auth::user();

        if ($user->inRole('cfo')) {
            return $builder->where('user_id', $user->id);
        }

        return $builder;
    }
}
