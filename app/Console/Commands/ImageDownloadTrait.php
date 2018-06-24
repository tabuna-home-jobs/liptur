<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Orchid\Platform\Core\Models\Attachment;

trait ImageDownloadTrait
{
    /**
     * @param $post_id           int ID поста
     * @param $client            object Клиент
     * @param $externalImagePath string Ссылка на выходное изображение
     * @param $imageStoragePath  string Путь сохранения
     * @param $imageDate         string Дата изображения
     * @param $imageInfo         object Информация изображения
     * @param $name              string Имя изображиения
     *
     * @return mixed
     */
    protected function saveImage($post_id, $client, $externalImagePath, $imageStoragePath, $imageDate, $imageInfo, $name)
    {
        Storage::disk('public')->makeDirectory($imageDate);

        $client->get($externalImagePath, [
            'sink' => storage_path($imageStoragePath),
        ]);

        $path = '/'.$imageDate.'/';

        foreach (config('content.images', []) as $key => $value) {
            $this->saveImageProcessing(
                [
                    'info' => $imageInfo,
                    'name' => $name,
                    'path' => $path,
                ],
                $key,
                $value['width'],
                $value['height'],
                $value['quality']
            );
        }

        return Attachment::create([
            'name'          => $name,
            'original_name' => $imageInfo['filename'],
            'mime'          => '',
            'extension'     => $imageInfo['extension'],
            'size'          => 0,
            'path'          => $path,
            'user_id'       => 0,
            'post_id'       => $post_id,
        ]);
    }

    /**
     * @param      $image
     * @param null $name
     * @param null $width
     * @param null $height
     * @param int  $quality
     */
    protected function saveImageProcessing($image, $name = null, $width = null, $height = null, $quality = 100)
    {
        $newName = $image['name'].'_'.$name.'.'.$image['info']['extension'];

        $name = $image['name'];

        $full_path = storage_path('app/public/'.'/'.$this->date.'/'.$newName);

        $path = storage_path('app/public/'.'/'.$this->date.'/'.$name.'.'.$image['info']['extension']);

        chmod($path, 0777);

        Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($full_path, $quality);
    }
}
