<?php

namespace App\Http\Filters\Titz;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Orchid\Platform\Filters\Filter;

class TitzFilter extends Filter
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

        if ($user->inRole('titz')) {
            return $builder->where('user_id', $user->id);
        }

        return $builder;
    }
}
