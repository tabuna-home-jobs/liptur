<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\Post;

/**
 * Class OrderObserver.
 */
class OrderObserver
{
    private $negative_statuses = ["payed", "inwork", "indelivery", "delivered"];

    /**
     * @param String $status
     * @return int
     */
    private function getStatusFactor(String $status) {
        if (in_array($status, $this->negative_statuses)) {
            return -1;
        }
        return 1;
    }

    /**
     * @param Order $model
     * @return int
     */
    private function getStatusesFactor(Order $model) {
        $old_status = json_decode($model->getOriginal('options'))->status;
        $new_status = $model->options['status'];

        $old_factor = $this->getStatusFactor($old_status);
        $new_factor = $this->getStatusFactor($new_status);

        if($old_factor == $new_factor) {
            return 0;
        }

        return $new_factor;
    }

    /**
     * @param Order $model
     * @param int $factor
     */
    private function changeProductsCount(Order $model, int $factor) {
        foreach ($model->options['content'] as $item) {
            $product_id = $item['id'];
            $count = $item['qty'];
            $product = Post::type('product')->find($product_id);


            $new_count = intval($product->getOption('count') ?? 0) + $factor * $count;

            $product->setAttribute('options->count', $new_count);

            $product->save();
        }
    }

    /**
     * @param \App\Models\Order $model
     *
     * @return \App\Models\Order
     */
    public function creating(Order $model)
    {
        $model->setAttribute('slug', hash('crc32b', rand(0, 999999999)));

        return $model;
    }

    /**
     * @param \App\Models\Order $model
     *
     * @return \App\Models\Order
     */
    public function created(Order $model)
    {
        // TODO: SEND MAIL MESSAGE

        return $model;
    }

    /**
     * @param \App\Models\Order $model
     *
     * @return \App\Models\Order
     */
    public function updated(Order $model)
    {
        // TODO: SEND MAIL MESSAGE


        $factor = $this->getStatusesFactor($model);

        if($factor !== 0) {
            $this->changeProductsCount($model, $factor);
        }

        return $model;
    }

    /**
     * @param Order $order
     * @return Order
     */
    public function deleted(Order $order)
    {
        $factor = $this->getStatusFactor($order->options['status']);

        // Если в работе - то добавляем к остатку
        if($factor == -1) {
            $this->changeProductsCount($order, 1);
        }
        return $order;
    }
}
