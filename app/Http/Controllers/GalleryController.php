<?php

namespace App\Http\Controllers;

use App\Core\Models\Attachment;
use App\Core\Models\Comment;
use App\Core\Models\Post;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class GalleryController extends Controller
{

    /**
     * GalleryController constructor.
     */
    public function __construct()
    {
        $this->middleware('cache');
    }

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
            ])->has('post')->join('likeable_like_counters', function ($join) {
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

        return view('listings.gallery', [
            'gallery'      => Post::type('gallery')->whereNotNull('content->' . App::getLocale())->with('attachment')->paginate(20),
            'countGallery' => Post::type('gallery')->whereNotNull('content->' . App::getLocale())->count(),
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
        $attachment = Attachment::where('post_id', $id)->with(['likeCounter', 'likes', 'comments.author'])->get();

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
