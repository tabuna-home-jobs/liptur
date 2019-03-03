<?php

namespace App\Models;

use Orchid\Press\Models\Category;
use Orchid\Platform\Traits\AttachTrait;
use Orchid\Platform\Traits\FilterTrait;
use Orchid\Platform\Traits\MultiLanguageTrait;

class ShopCategory extends Category
{
    use AttachTrait, MultiLanguageTrait, FilterTrait;

    /**
     * Used to set the post's type.
     */
    protected $taxonomy = 'shop-category';
}
