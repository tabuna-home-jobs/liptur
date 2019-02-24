<?php

namespace App\Observers;

use App\Models\Order;

/**
 * Class OrderObserver.
 */
class OrderObserver
{
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

        return $model;
    }
}
