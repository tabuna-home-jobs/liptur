<?php

namespace App\Core\Models;

use Conner\Likeable\LikeableTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Orchid\Platform\Core\Models\Attachment as BaseAttachment;
use Orchid\Platform\Core\Models\Comment;

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
