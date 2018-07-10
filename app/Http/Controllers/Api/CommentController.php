<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Auth;
use Orchid\Platform\Core\Models\Comment;
use Orchid\Platform\Core\Models\Post;

class CommentController
{
    /**
     * @param Post           $post
     * @param CommentRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function comment(Post $post, CommentRequest $request)
    {
        Comment::create([
            'post_id' => $post->id,
            'user_id' => Auth::user()->id,
            'parent_id' => 0,
            'content' => $request->get('content'),
            'approved' => 1,
        ]);

        return response(200);
    }
}
