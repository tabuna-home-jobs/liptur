<?php

namespace App\Http\Controllers\Other;

use App\Core\Models\Post;
use App\Http\Controllers\Controller;

class LikeController extends Controller
{
    /**
     * @param Post $post
     */
    public function update(Post $post)
    {
        if (!$post->liked()) {
            return $post->like();
        }

        return $post->unlike();
    }
}
