<?php

declare(strict_types=1);

namespace App\Http\Filters;

use Orchid\Screen\Field;
use Orchid\Platform\Filters\Filter;
use Orchid\Screen\Fields\SelectField;
use Illuminate\Database\Eloquent\Builder;

class StatusFilter extends Filter
{
    /**
     * @var array
     */
    public $parameters = [
        'status',
    ];

    /**
     * @param Builder $builder
     *
     * @return Builder
     */
    public function run(Builder $builder): Builder
    {
        if ($this->request->get('status')=='all') return $builder;

        return $builder->status($this->request->get('status'));
    }

    /**
     * @return Field
     */
    public function display(): Field
    {
        return SelectField::make('status')
            ->value($this->request->get('status'))
            ->options([
                'all' => __('All'),
                'publish' => __('Published'),
                'draft'   => __('Draft'),
            ])
            ->title(__('Status'))
            ->autocomplete('off');
    }
}
