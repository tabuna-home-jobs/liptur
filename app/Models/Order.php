<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Orchid\Platform\Traits\MultiLanguageTrait;

/**
 * Class subscription.
 */
class Order extends Model
{
    use MultiLanguageTrait, SoftDeletes;

    /**
     * @var array
     */
    public $ordervar = [
        'status' => [
            'new'        => 'Новый',
            'payed'        => 'Оплачен',
            'inwork'     => 'В работе',
            'indelivery' => 'В доставке',
            'delivered'  => 'Доставлен',
            'closed'     => 'Закрыт',
            'canceled'   => 'Отменен',
        ],

        'delivery' => [
            'pickup'  => 'Самовывоз',
            'courier' => 'Транспортной компанией',
            'mail'    => 'Почта России',
            //'boxberry'    => 'Получение в центрах выдачи boxberry',
        ],
        'payment'  => [
            'cash'     => 'Наличными при получении',
            'card'     => 'Оплата банковской картой',
            'cashless' => 'Оплата по счету',
        ],
    ];
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
    protected $dates    = ['deleted_at'];

    /*
     * @var array
     */
    /**
     * @var array
     */
    protected $casts = [
        'options' => 'array',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
