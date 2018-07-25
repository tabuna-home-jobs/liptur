<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Platform\Core\Traits\MultiLanguage;

/**
 * Class subscription.
 */
class Order extends Model
{
    use MultiLanguage;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'order';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'slug',
        'options',
    ];

    /**
     * @var array
     */
    protected $casts = [
      'options' => 'array',
    ];

    /*
     * @var array
     */
    public $ordervar = [
                'status' => [
                    'new'       => 'Новый',
                    'inwork'    => 'В работе',
                    'indelivery'=> 'В доставке',
                    'delivered' => 'Доставлен',
                    'closed'    => 'Закрыт',
                    'canceled'  => 'Отменен',
                ],

                'delivery' => [
                    'pickup'      => 'Самовывоз',
                    'courier'     => 'Доставка курьером',
                    'mail'        => 'Почта России',
                  //'boxberry'    => 'Получение в центрах выдачи boxberry',
                ],
                'payment' => [
                    'cash'      => 'Наличными',
                  //'card'      => 'Банковская карта',
                ],
            ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
