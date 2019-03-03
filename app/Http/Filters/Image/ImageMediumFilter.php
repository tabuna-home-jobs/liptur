<?php

namespace App\Http\Filters\Image;

use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;

class ImageMediumFilter implements FilterInterface
{
    /**
     * Applies filter effects to given image
     *
     * @param  Intervention\Image\Image $image
     * @return Intervention\Image\Image
     */
    public function applyFilter(Image $image)
    {
        $image->resize(null, 300, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $image->response('jpg',75);

        return $image;
    }
}