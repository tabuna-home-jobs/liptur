<?php

namespace App\Http\Filters\Common;

use Illuminate\Database\Eloquent\Builder;
use Orchid\Platform\Filters\Filter;

class DistanceFilters extends Filter
{
    /**
     * @var string
     */
    public $parameters = 'distance';

    /**
     * @param Builder $builder
     *
     * @return Builder
     */
    public function run(Builder $builder): Builder
    {
        if ($this->request->get('distance') == 1) {
            return $builder;
        }

        return $builder->where('content->'.$this->lang.'->distance', '<', $this->request->get('distance'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function display()
    {
        return view('partials.filters.common.distance', [
            'request' => $this->request,
        ]);
    }
}
