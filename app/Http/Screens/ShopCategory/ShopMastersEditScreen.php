<?php

declare(strict_types=1);

namespace App\Http\Screens\ShopCategory;

use Orchid\Screen\Link;
use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use Orchid\Press\Models\Term;
use App\Models\ShopCategory;
use Orchid\Support\Facades\Alert;
use App\Http\Layouts\ShopCategory\ShopMastersEditLayout;
use App\Models\Master;
use App\Models\Region;

class ShopMastersEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Ремесленник';
    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Добавление мастера';

    /**
     * Query data.
     *
     * @param ShopCategory $category
     *
     * @return array
     */
    public function query(Master $category = null): array
    {
        $masterlist = Master::all();
		 
		$slug = 'suvenirnaya-produkciya';
        $categoryShop =ShopCategory::slug($slug)->first();
        //dd($categoryShop->getAllCategoriesTerm());
		//'catselect'=> $category->getAllCategories(),

        //if (! $category->exists) {
        //    $category->setRelation('term', [new Term()]);
        //}
		
		$allRegionList = Region::orderBy('content')->get();
		
		$regionList = array();
		foreach($allRegionList as $item){
			$regionList[$item->id] = $item->content;
		}
		
//dd($simpleList);
        return [
            'category' => $category,
			'catselectShop'=> $categoryShop->getAllCategories(),
            'catselect'=> $regionList,			
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
            ShopMastersEditLayout::class,
        ];
    }

    /**
     * @param ShopCategory $category
     * @param Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Master $category, Request $request)
    {
		
        $attributes = $request->get('category');
		
		
		
		
		$slug = 'suvenirnaya-produkciya';
        $categoryShop = ShopCategory::slug($slug)->first();
		$categoryNames = $categoryShop->getAllCategories();
		$category = new Master;
		$remesloList = '';		
	
	    foreach($attributes ['remeslo'] as $item){
			$remesloList .= $categoryNames[$item].'; ';
		}
		//dd($remesloList);
		
		$catregion = Region::all();
		if($attributes ['region_id']!=0)
		{
		$categoryname = $catregion[$attributes ['region_id']-1]->content;
		}
	    else $categoryname = 'Район не указан';
		
		
		//dd($categoryname);
		$category->fio = $attributes ['fio'];
		$category->region_id = $attributes ['region_id']; 
		$category->adress = $categoryname;
		$category->contacts = $attributes ['contacts'];
		$category->description =  str_replace("&nbsp;", '', $attributes ['description']);
		$category->photo = $attributes ['photo'];
		$category->remeslo = $remesloList;
		$category->created_at = 2019-04-30;
		$category->id = Master::orderBy('id', 'desc')->first()->id+1;
		
		$category->save();		
		

        Alert::info(__('Masters was saved'));

        return redirect()->route('platform.shop.masters');
    }

    /**
     * @param ShopCategory $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Master $category)
    {
        $category->delete();

        Alert::info(__('Мастер удалён'));

        return redirect()->route('platform.shop.masters');
    }
}
