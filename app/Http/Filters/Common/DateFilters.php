<?php

namespace App\Http\Filters\Common;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Orchid\Platform\Filters\Filter;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\SwitchField;
use Orchid\Screen\Fields\SelectField;

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

    public function display(): Field
    {
        return SelectField::make('archive')
            ->value($this->request->get('archive'))
            ->options([
                '0' => 'Текущие',
                '1'   => 'Все записи',
            ])
            ->title('Показать архивные')
            ->autocomplete('off');
            /*
        return SwitchField::make('archive')
            ->title('')
            ->placeholder('Показать архивные');
            */
    }
}
