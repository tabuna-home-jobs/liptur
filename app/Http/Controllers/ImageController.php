<?php

namespace App\Http\Controllers;


class ImageController extends Controller
{

    public function index($src)
    {
        $a_src=(explode('/',$src));
        $path=array_shift($a_src);
        $template = [
            'small' => \App\Http\Filters\Image\ImageSmallFilter::class,
            'medium' => \App\Http\Filters\Image\ImageMediumFilter::class,
            'standart' => \App\Http\Filters\Image\ImageMediumFilter::class,
            'high' => \App\Http\Filters\Image\ImageHighFilter::class,
        ];
        if (array_key_exists($path, $template)) {
            $filter=$template[$path];
            $src=implode('/',$a_src);
        } else {
            $filter=false;
        }


        $cacheimage = \Image::cache(function($image) use ($src,$filter) {
            $image->make($src);
            if ($filter) {
                $image->filter(new $filter);
            }
            return $image;

        }, 1, false);

        return \Response::make($cacheimage, 200, array('Content-Type' =>
            'image/jpeg'));

    }



}
