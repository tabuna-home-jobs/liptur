<?php

declare(strict_types=1);

namespace App\Models;

use Orchid\Press\Traits\TaggableTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Orchid\Platform\Traits\MultiLanguageTrait;

class ProductArrival extends Model
{
    use MultiLanguageTrait, TaggableTrait, Sluggable;

    /**
     * @var string
     */
    protected $table = 'product_arrival';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'product_id',
        'count',
        'slug',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'content' => 'array',
        'slug'    => 'string',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'slug',
            ],
        ];
    }
}
