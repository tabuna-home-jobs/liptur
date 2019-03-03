<?php

namespace App\Http\Filters\Image;

use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;

class ImageHighFilter implements FilterInterface
{
    /**
     * Default size of filter effects
     */
    const DEFAULT_SIZE = 10;

    /**
     * Size of filter effects
     *
     * @var integer
     */
    private $size;

    /**
     * Creates new instance of filter
     *
     * @param integer $size
     */
    public function __construct($size = null)
    {
        $this->size = is_numeric($size) ? intval($size) : self::DEFAULT_SIZE;
    }

    /**
     * Applies filter effects to given image
     *
     * @param  Intervention\Image\Image $image
     * @return Intervention\Image\Image
     */
    public function applyFilter(Image $image)
    {
        $image->resize(null, 500, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $image->response('jpg',80);

        return $image;
    }
}