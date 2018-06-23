<?php namespace App\Http\Filters\Leisure;

use Illuminate\Database\Eloquent\Builder;
use Orchid\Platform\Filters\Filter;

class CategoryFilters extends Filter
{
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
                $builder = $builder->where('options->category->' . $item, '1');
            } else {
                $builder = $builder->orWhere('options->category->' . $item, '1');
            }

        }

        return $builder;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function display()
    {
        return view('partials.filters.leisure.category', [
            'request'  => $this->request,
            'category' => config('category.leisure.category'),
        ]);
    }
}
