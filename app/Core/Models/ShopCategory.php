<?php

namespace App\Core\Models;

use Orchid\Platform\Core\Models\Category;
use Orchid\Platform\Core\Traits\Attachment;
use Orchid\Platform\Core\Traits\MultiLanguage;
use Orchid\Platform\Core\Traits\FilterTrait;

class ShopCategory extends Category
{
  use Attachment, MultiLanguage, FilterTrait;

  /**
   * Used to set the post's type.
   */
  protected $taxonomy = 'shop-category';
}