<?php

namespace App\Http\Filters\Common;

use Illuminate\Database\Eloquent\Builder;
use Orchid\Platform\Filters\Filter;

class RegionFilters extends Filter
{
    /**
     * @var string
     */
    public $parameters = 'region';

    /**
     * @param Builder $builder
     *
     * @return Builder
     */
    public function run(Builder $builder): Builder
    {
        return $builder->where('content->'.$this->lang.'->region', $this->request->get('region'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function html()
    {
        return view('partials.filters.common.region', [
            'region'  => collect(config('region'))->sortBy('sort'),
            'request' => $this->request,
        ]);
    }
}
