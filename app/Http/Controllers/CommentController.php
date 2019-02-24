<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Auth;
use Orchid\Press\Models\Comment;
use Orchid\Press\Models\Post;

class CommentController extends Controller
{
    /**
     * @param Post           $post
     * @param CommentRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Post $post, CommentRequest $request)
    {
        Comment::create([
            'post_id'   => $post->id,
            'user_id'   => Auth::user()->id,
            'parent_id' => 0,
            'content'   => $request->get('content'),
            'approved'  => 1,
        ]);

        return back();
    }

    /**
     * @param \Orchid\Press\Models\Post $post
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Post $post)
    {
        $comments = $post->comments()->paginate();

        return response()->json($comments);
    }
}
