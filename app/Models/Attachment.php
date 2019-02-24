<?php

namespace App\Models;

use Conner\Likeable\LikeableTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Orchid\Attachment\Models\Attachment as BaseAttachment;
use Orchid\Press\Models\Comment;

class Attachment extends BaseAttachment
{
    use LikeableTrait;

    /**
     * @return string
     */
    public function get_called_class()
    {
        return get_parent_class($this);
    }

    /**
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'attachment_id');
    }
}
