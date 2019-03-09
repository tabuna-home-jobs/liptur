<?php

namespace App\Http\Filters\Image;

use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;

class ImageSmallFilter implements FilterInterface
{
    /**
     * Applies filter effects to given image
     *
     * @param  Intervention\Image\Image $image
     * @return Intervention\Image\Image
     */
    public function applyFilter(Image $image)
    {
        $image->resize(110, 110);
        $image->response('jpg',60);

        return $image;
    }
}