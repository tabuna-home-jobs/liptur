<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Comment;
use App\Models\Post;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class GalleryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $mostPopular = Cache::remember('most-popular-gallery', 30, function () {
            $popular = Attachment::whereIn('extension', [
                'jpg',
                'png',
                'JPG',
            ])
            //->has('post')
            ->join('likeable_like_counters', function ($join) {
                $join->on('attachments.id', '=', 'likeable_like_counters.likable_id')
                    ->where('likeable_like_counters.likable_type', '=', Attachment::class);
            })
                ->orderBy('likeable_like_counters.count', 'desc')
                ->limit(16)
                ->get();
            $popular->map(function ($attach) {
                $attach->url = $attach->url('medium');
                $attach->original_url = $attach->url();

                return $attach;
            });

            return $popular;
        });
        $gallery = Post::type('gallery')
            ->whereNotNull('content->'.App::getLocale())
            ->orderBy('updated_at','desc')
            ->with('attachment')
            ->simplePaginate(20);

        return view('listings.gallery', [
            'gallery'      => $gallery,
            'countGallery' => Post::type('gallery')->whereNotNull('content->'.App::getLocale())->count(),
            'mostPopular'  => $mostPopular,
        ]);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store($id)
    {
        $post = Post::where('id', $id)->with(['attachment'])->firstOrFail();

        $attachment = Attachment::whereIn('id', $post->attachment->pluck('id'))
            ->with(['likeCounter', 'likes', 'comments.author'])->get();

        $attachment->map(function ($attach) {
            $attach->url = $attach->url('high');
            $attach->original_url = $attach->url();

            return $attach;
        });

        return response()->json($attachment);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function like($id)
    {
        $attachment = Attachment::findOrFail($id);
        if (!$attachment->liked()) {
            return $attachment->like();
        }

        return $attachment->unlike();
    }

    /**
     * @param                $id
     * @param CommentRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function comment($id, CommentRequest $request)
    {
        Comment::create([
            'post_id'       => 0,
            'user_id'       => Auth::user()->id,
            'parent_id'     => 0,
            'content'       => $request->get('content'),
            'approved'      => 1,
            'attachment_id' => $id,
        ]);

        $attachment = Attachment::where('id', $id)->with(['likeCounter', 'likes', 'comments.author'])->first();
        $attachment->url = $attachment->url('high');
        $attachment->original_url = $attachment->url();

        return response()->json($attachment);
    }
}
