<?php

namespace App\Core\Observers;

use App\Core\Models\Post;
use Illuminate\Database\Eloquent\Model;

class ProductObserver
{
    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function saved(Model $model)
    {
        if($model->type !== 'product'){
            return $model;
        }

        // Только 8 новых товаров
        if($model->getOption('new') === 1){
            $this->limitProductType('new',8);
        }

        // Только 8 специальных предложений товаров
        if($model->getOption('special') === 1){
            $this->limitProductType('special',8);
        }
    }


    /**
     * @param $option
     * @param $skip
     *
     * @return mixed
     */
    private function limitProductType($option,$skip)
    {
        return Post::where('type','product')
            ->where('options->'.$option,true)
            ->skip($skip)
            ->orderBy('updated_at','Desc')
            ->update([
                'options->new', false
            ]);
    }
}