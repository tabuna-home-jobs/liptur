<?php

namespace App\Http\Controllers\Titz;

use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Orchid\Platform\Models\Role;
use Orchid\Support\Facades\Alert;

class TitzController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $role = Role::where('slug', 'titz')->first();
        $rawUsers = $role->users()->select('id')->get()->toArray();
        $tmp = [];
        foreach ($rawUsers as $item) {
            $tmp[] = $item['id'];
        }
        //$users = User::whereIn('id', $rawUsers)->get();
        $users = User::whereIn('id', $tmp)->get();

        return view('listings.titz', [
            'users' => $users,
        ]);
    }

    /**
     * @param User $user
     * @param      $typeRequest
     *
     * @return View
     */
    public function listing(User $user, $typeRequest): View
    {
        $typeObject = dashboard_posts()->firstWhere('slug', $typeRequest) ?? abort(404);

        $elements =   \Cache::remember('titz-controller-listing-'.$typeRequest.'-'.$user->id.'-'.App::getLocale(), \Carbon\Carbon::now()->addHour(), function () use ($typeRequest,$user) {
            return Post::where('type', $typeRequest)
                ->where('user_id', $user->id)
                ->whereNotNull('options->locale->' . App::getLocale())
                ->orderBy('publish_at', 'DESC')
                //->filtersApply($typeRequest)
                ->simplePaginate(5);
        });


        return view('titz.catalog', [
            'elements' => $elements,
            'type'     => $typeObject,
            'name'     => $typeObject->name,
            'page'     => getPage($typeRequest),
            'user'     => $user,
        ]);
    }

    /**
     * @param User $user
     *
     * @return View
     */
    public function news(User $user): View
    {
        $typeObject = dashboard_posts()->firstWhere('slug', 'news') ?? abort(404);
        $elements =   \Cache::remember('titz-controller-listing-news-'.$user->id.'-'.App::getLocale(), \Carbon\Carbon::now()->addHour(), function () use ($user) {
            return Post::where('type', 'news')
                ->where('user_id', $user->id)
                ->whereNotNull('options->locale->'.App::getLocale())
                ->orderBy('publish_at', 'DESC')
                ->filtersApply('news')
                ->simplePaginate(5);
        });

        return view('titz.news', [
            'elements' => $elements,
            'type'     => $typeObject,
            'name'     => $typeObject->name,
            'page'     => getPage('news'),
            'user'     => $user,
        ]);
    }

    /**
     * @param User $user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function gallery(User $user)
    {
        $gallery =   \Cache::remember('titz-controller-gallery-'.$user->id.'-'.App::getLocale(), \Carbon\Carbon::now()->addHour(), function () use ($user) {
            return Post::type('gallery')
                ->where('user_id', $user->id)
                ->whereNotNull('content->' . App::getLocale())
                ->orderBy('publish_at', 'DESC')
                ->with('attachment')
                ->paginate(20);
        });

        return view('titz.gallery', [
            'gallery' => $gallery,
            'user'    => $user,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        return view('titz.edit', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $user->titz = $request->all();

        if ($request->hasFile('avatar')) {
            $img = Image::make($request->file('avatar'));
            $img->resize(1920, 500, function ($constraint) {
                $constraint->aspectRatio();
            });

            $time = time();
            $date = date('Y/m/d');
            $name = str_random(40);

            Storage::disk('public')->makeDirectory($date);

            $name = sha1($time.$name);
            $fullPath = storage_path('app/public'.DIRECTORY_SEPARATOR.$date.DIRECTORY_SEPARATOR.$name.'.jpg');
            $img->save($fullPath, 60);

            $user->setAttribute('titz->avatar', '/storage/'.$date.'/'.$name.'.jpg');
        }

        $user->save();

        Alert::success('Вы успешно изменили профиль');

        return back();
    }
}
