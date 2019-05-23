<?php

declare(strict_types=1);

namespace App\Http\Layouts\ShopCategory;

use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;
use App\Models\Master;

class ShopMastersListLayout extends Table
{
    /**
     * @var string
     */
    public $data = 'masterlist';

    /**
     * HTTP data filters.
     *
     * @return array
     */
    public function filters(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function fields(): array
    {
		
		//dd($masterlist[0]->region_id);
        return [
            TD::set('name', __('ФИО'))
                ->setRender(function ($masterlist) {
                    return '<a href="'.route('platform.shop.masters.edit',
                            $masterlist->id).'">'.$masterlist->fio.'</a>';
                }),
            /*TD::set('name', __('ФИО'))
                ->setRender(function ($masterlist) {
                    return $masterlist->fio;
                }),*/
            TD::set('region', __('Регион'))
                ->setRender(function ($masterlist) {
                    return $masterlist->adress;
                }),
			/*TD::set('ID', __('ID'))
                ->setRender(function ($masterlist) {
                    return $masterlist->id;
                }),*/
				
        ];
    }
		
}
