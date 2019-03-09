<?php

namespace App\Http\Controllers;


class ImageController extends Controller
{

    public function index($src)
    {
        $a_src=(explode('/',$src));
        $path=array_shift($a_src);

        $template=config('imagecache.templates');
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
