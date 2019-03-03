<?php

declare(strict_types=1);

namespace App\Http\Layouts\ShopCategory;

use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;

class ShopCategoryListLayout extends Table
{
    /**
     * @var string
     */
    public $data = 'category';

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
        return [
            TD::set('name', __('Name'))
                ->setRender(function ($category) {
                    return '<a href="'.route('platform.shop.category.edit',
                            $category->id).'">'.$category->delimiter.' '.$category->term->GetContent('name').'</a>';
                }),
            TD::set('slug', __('Slug'))
                ->setRender(function ($category) {
                    return $category->term->slug;
                }),
            TD::set('created_at', __('Created'))
                ->setRender(function ($category) {
                    return $category->term->created_at;
                }),
        ];
    }
}
