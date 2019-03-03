<?php

namespace App\Http\Filters\Common;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Orchid\Platform\Filters\Filter;

class DateFilters extends Filter
{
    /**
     * @param Builder $builder
     *
     * @return Builder
     */
    public function run(Builder $builder): Builder
    {
        if ($this->request->get('archive', false)) {
            return $builder
                ->orderByRaw('content->"$.'.$this->lang.'.close"', 'desc');
        }

        return $builder
            ->whereRaw('content->"$.'.$this->lang.'.close"  > "'.Carbon::today()->toDateString().'"')
            ->orderByRaw('content->"$.'.$this->lang.'.open"', 'ASC');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function html()
    {
        return view('partials.filters.common.archive', [
            'request' => $this->request,
        ]);
    }
}
