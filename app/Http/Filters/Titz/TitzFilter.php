<?php

namespace App\Http\Filters\Titz;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Orchid\Platform\Filters\Filter;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\InputField;

class TitzFilter extends Filter
{
    /**
     * @var bool
     */
    public $dashboard = true;

    /**
     * @param Builder $builder
     *
     * @return Builder
     */
    public function run(Builder $builder): Builder
    {
        $user = Auth::user();

        if ($user && $user->inRole('titz')) {
            return $builder->where('user_id', $user->id);
        }

        return $builder;
    }

    public function display(): Field
    {
        return InputField::make('titz')
            ->type('hidden')
            ->value('1');
    }
}
