<?php

namespace App\Http\Filters\Common;

use Illuminate\Database\Eloquent\Builder;
use Orchid\Platform\Filters\Filter;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\SelectField;

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
        if ($this->request->get('region')=='all') return $builder;

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

    public function display(): Field
    {
        foreach (config('region') as $key => $value) {
            $region[$key] = $value['name'];
        }
        return SelectField::make('region')
            ->value($this->request->get('region'))
            ->options(array_merge(
                ['all' => 'Все регионы'],
                $region
            ))
            ->title(__('Regions'))
            ->autocomplete('off');
    }
}
