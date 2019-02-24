<?php

namespace App\Http\Filters\Hotel;

use Illuminate\Database\Eloquent\Builder;
use Orchid\Platform\Filters\Filter;

class ServiceFilters extends Filter
{
    /**
     * @param Builder $builder
     *
     * @return Builder
     */
    public function run(Builder $builder): Builder
    {
        $service = (array) $this->request->get('service', []);

        foreach ($service as $key => $item) {
            if ($key === 0) {
                $builder = $builder->where('options->option->'.$item, '1');
            } else {
                $builder = $builder->orWhere('options->option->'.$item, '1');
            }
        }

        return $builder;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function html()
    {
        return view('partials.filters.hostel.service', [
            'request'    => $this->request,
            'parameters' => [
                'icon-lip-wifi'     => 'Wi-Fi',
                'icon-lip-dinner'   => 'Обед',
                'icon-lip-disabled' => 'Доступная среда',
                'icon-lip-parking'  => 'Парковка',
            ],
            //'service' => config('icon')
        ]);
    }
}
