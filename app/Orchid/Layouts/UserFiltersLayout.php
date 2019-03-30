<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Layouts\Selection;
use App\Orchid\Filters\RoleFilter;

class UserFiltersLayout extends Selection
{
    /**
     * @return array
     */
    public function filters(): array
    {
        return [
            RoleFilter::class
        ];
    }
}
