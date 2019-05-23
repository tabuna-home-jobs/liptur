<?php

declare(strict_types=1);

namespace App\Http\Screens\ShopCategory;

use Orchid\Screen\Link;
use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use Orchid\Press\Models\Term;
use App\Models\ShopCategory;
use Orchid\Support\Facades\Alert;
use App\Http\Layouts\ShopCategory\ShopCategoryEditLayout;

class ShopCategoryEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Category';
    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Category of the website';

    /**
     * Query data.
     *
     * @param ShopCategory $category
     *
     * @return array
     */
    public function query(ShopCategory $category = null): array
    {

        //dd($category);

        if (! $category->exists) {
            $category->setRelation('term', [new Term()]);
        }

        return [
            'category' => $category,
            'catselect'=> $category->getAllCategories(),
        ];
    }

    /**
     * Button commands.
     *
     * @return array
     */
    public function commandBar(): array
    {
        return [
            Link::name(__('Save'))
                ->icon('icon-check')
                ->method('save'),

            Link::name(__('Remove'))
                ->icon('icon-trash')
                ->method('remove'),
        ];
    }

    /**
     * Views.
     *
     * @return array
     */
    public function layout(): array
    {
        return [
            ShopCategoryEditLayout::class,
        ];
    }

    /**
     * @param ShopCategory $category
     * @param Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(ShopCategory $category, Request $request)
    {
        $attributes = $request->get('category');

        if (! $category->exists) {
            $category->newWithCreateTerm($attributes['term']);
        }

        $category->setParent($attributes['parent_id']);

        $category->term->fill($attributes['term'])->save();
        $category->save();

        Alert::info(__('Category was saved'));

        return redirect()->route('platform.shop.category');
    }

    /**
     * @param ShopCategory $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(ShopCategory $category)
    {
        $category->term->delete();
        $category->delete();

        Alert::info(__('Category was removed'));

        return redirect()->route('platform.shop.category');
    }
}
