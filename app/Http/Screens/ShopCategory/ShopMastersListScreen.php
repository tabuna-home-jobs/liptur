<?php

declare(strict_types=1);

namespace App\Http\Screens\ShopCategory;

use Orchid\Screen\Link;
use Orchid\Screen\Screen;
use App\Models\ShopCategory;
use App\Http\Layouts\ShopCategory\ShopMastersListLayout;
use App\Http\Layouts\ShopCategory\ShopCategoryListLayout;
use App\Models\Master;

class ShopMastersListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Мастера';
    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Список ремесленников';

    /**
     * Query data.
     *
     * @return array
     */
    public function query() : array
    {
        //$categories = Master::all();
		$masterlist = Master::select('id', 'fio', 'adress')->orderBy('fio')->get();
        //dd($categories);
        $allCategories = collect();  
$categories = ShopCategory::where('parent_id', null)->with('allChildrenTerm')->get();
        //dd($categories);
        $allCategories = collect();

        foreach ($categories as $category) {
            $allCategories = $allCategories->merge($this->getCategory($category));
        }		

        return [
            //'category' => $allCategories,
			'masterlist' =>$masterlist,
        ];
    }

    /**
     * @param App\Models\ShopCategory $category
     * @param string                        $delimiter
     *
     * @return \Illuminate\Support\Collection
     */
       private function getCategory(ShopCategory $category, $delimiter = '')
    {
        $result = collect();
        $category->delimiter = $delimiter;
        $result->push($category);

        if (! $category->allChildrenTerm()->count()) {
            return $result;
        }

        foreach ($category->allChildrenTerm()->get() as $item) {
            $result = $result->merge($this->getCategory($item, $delimiter.'-'));
        }

        return $result;
    }

    /**
     * Button commands.
     *
     * @return array
     */
    public function commandBar() : array
    {
        return [
            Link::name(__('Add'))
                ->icon('icon-plus')
                ->link(route('platform.shop.masters.create')),
        ];
    }	

    /**
     * Views.
     *
     * @return array
     */
    public function layout() : array
    {
        return [
            ShopMastersListLayout::class,
        ];
    }
}
