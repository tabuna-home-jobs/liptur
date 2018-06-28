<?php

namespace App\Http\Forms\Shop;

use App\Core\Models\ShopCategory;
use App\Events\Shop\ShopCategoryEvent;
use Orchid\Platform\Forms\FormGroup;

class CategoryFormGroup extends FormGroup
{
    /**
     * @var
     */
    public $event = ShopCategoryEvent::class;

    /**
     * @var
     */
    protected $categoryBehavior;

    /**
     * Description Attributes for group.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'name'        => trans('dashboard::systems/category.title'),
            'description' => trans('dashboard::systems/category.description'),
        ];
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function main()
    {
        $behavior = new CategoryTemplate();

        return view('dashboard.shop.category.grid', [
            'category' => ShopCategory::filtersApply($behavior->filters())->where('parent_id', 0)->with('allChildrenTerm')->paginate(),
            'behavior' => $behavior,
            'filters'  => collect($behavior->filters()),
            'chunk'    => $behavior->chunk,
        ]);
    }
}
