<?php

declare(strict_types=1);

namespace App\Core\Models;

use Cartalyst\Tags\TaggableTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Orchid\Platform\Core\Traits\MultiLanguage;

class Term extends Model
{
    use MultiLanguage, TaggableTrait, Sluggable;

    /**
     * @var string
     */
    protected $table = 'terms';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'slug',
        'content',
        'term_group',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function taxonomy(): HasOne
    {
        return $this->hasOne(Taxonomy::class, 'term_id');
    }
}
