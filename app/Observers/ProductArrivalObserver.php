<?php

namespace App\Observers;

use App\Models\ProductArrival;
use App\Models\Post;

/**
 * Class OrderObserver.
 */
class ProductArrivalObserver
{
    /**
     * @param \App\Models\ProductArrival $model
     *
     * @return \App\Models\ProductArrival
     */
    public function creating(ProductArrival $model)
    {
        $model->setAttribute('slug', hash('crc32b', rand(0, 999999999)));

        return $model;
    }

    /**
     * @param \App\Models\ProductArrival $model
     *
     * @return \App\Models\ProductArrival
     */
    public function created(ProductArrival $model)
    {
        $product = Post::type('product')->find($model->product_id);


        $old_count = intval($product->getOption('count')) ?? 0;
        $count = intval($model->count) ?? 0;
        $new_count = $old_count + $count;

        $product->setAttribute('options->count', $new_count);
        $product->save();

        return $model;
    }

    /**
     * @param \App\Models\ProductArrival $model
     *
     * @return \App\Models\ProductArrival
     */
    public function updated(ProductArrival $model)
    {
        // TODO: SEND MAIL MESSAGE

        return $model;
    }
}
