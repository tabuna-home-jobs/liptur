<?php

namespace App\Http\Filters\Common;

use Illuminate\Database\Eloquent\Builder;
use Orchid\Platform\Filters\Filter;

class NameFilters extends Filter
{
    /**
     * @var string
     */
    public $parameters = 'name';

    /**
     * @param Builder $builder
     *
     * @return Builder
     */
    public function run(Builder $builder): Builder
    {
        //return $builder->whereRaw('LOWER(content->"$.'.$this->lang.'"->"$.'.'name'.'") like ?', ['%'.strtolower($this->request->get('name')) .'%']);
        return $builder->whereOr('content->'.$this->lang.'->name', 'like', '%'.$this->request->get('name').'%')
            ->where('content->'.$this->lang.'->name', 'like', '%'.title_case($this->request->get('name')).'%');
        //->whereOr('content->'.$this->lang.'->name','like', '%'. ucfirst($this->request->get('name')) .'%');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function html()
    {
        return view('partials.filters.common.name', [
            'request' => $this->request,
        ]);
    }
}
