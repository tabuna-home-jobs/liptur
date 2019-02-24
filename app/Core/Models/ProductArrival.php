<?php

declare(strict_types=1);

namespace App\Core\Models;

use Cartalyst\Tags\TaggableTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Orchid\Platform\Core\Traits\MultiLanguage;

class ProductArrival extends Model
{
    use MultiLanguage, TaggableTrait, Sluggable;

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
