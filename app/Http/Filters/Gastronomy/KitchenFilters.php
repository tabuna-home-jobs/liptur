<?php

namespace App\Http\Filters\Gastronomy;

use Illuminate\Database\Eloquent\Builder;
use Orchid\Platform\Filters\Filter;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\SelectField;

class KitchenFilters extends Filter
{
    /**
     * @param Builder $builder
     *
     * @return Builder
     */
    public function run(Builder $builder): Builder
    {

        $service = (array) $this->request->get('kitchens', []);

        foreach ($service as $key => $item) {
            if ($key === 0) {
                if ($item!='all') {
                    $builder = $builder->where('options->kitchens->' . $item, '1');
                }
            } else {
                $builder = $builder->orWhere('options->kitchens->'.$item, '1');
            }
        }

        return $builder;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function html()
    {
        return view('partials.filters.gastronomy.kitchen', [
            'request'  => $this->request,
            'kitchens' => config('category.gastronomy.kitchens'),
        ]);
    }

    public function display(): Field
    {
        return SelectField::make('kitchens')
                ->value($this->request->get('kitchens'))
                ->options(array_merge(
                    ['all' => 'Любая кухня'],
                    config('category.gastronomy.kitchens')
                ))
                ->title(__('Kitchens'))
                ->autocomplete('off');
    }
}
