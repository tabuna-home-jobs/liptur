<?php

namespace App\Models;

use Orchid\Press\Models\Comment as CommentBase;

class Comment extends CommentBase
{
    /**
     * @var array
     */
    protected $fillable = [
        'post_id',
        'user_id',
        'parent_id',
        'content',
        'approved',
        'attachment_id',
    ];
}