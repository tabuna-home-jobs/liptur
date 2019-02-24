<?php

declare(strict_types=1);

namespace App\Models;

use Orchid\Press\Traits\TaggableTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Orchid\Press\Models\Taxonomy;
use Orchid\Platform\Traits\MultiLanguageTrait;

class Term extends Model
{
    use MultiLanguageTrait, TaggableTrait, Sluggable;

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
