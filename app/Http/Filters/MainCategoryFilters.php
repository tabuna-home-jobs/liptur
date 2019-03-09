<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Orchid\Platform\Filters\Filter;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\SelectField;

class MainCategoryFilters extends Filter
{

    public $slug =  'hostel';

    /**
     * @param Builder $builder
     *
     * @return Builder
     */
    public function run(Builder $builder): Builder
    {
        $service = (array) $this->request->get('category', []);

        foreach ($service as $key => $item) {
            if ($key === 0) {
                if ($item!='all') {
                    $builder = $builder->where('options->category->' . $item, '1');
                }
            } else {
                $builder = $builder->orWhere('options->category->'.$item, '1');
            }
        }
        return $builder;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function html()
    {
        return view('partials.filters.'.$this->slug.'.category', [
            'request'  => $this->request,
            'category' => config('category.'.$this->slug.'.category'),
        ]);
    }

    public function display(): Field
    {

        return SelectField::make('category')
            ->value($this->request->get('category'))
            ->options(array_merge(
                ['all' => 'Все категории'],
                config('category.'.$this->slug.'.category')
            ))
            ->title(__('Category'))
            ->autocomplete('off');
    }
}
