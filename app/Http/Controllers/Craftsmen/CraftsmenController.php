<?php

namespace App\Http\Controllers\Craftsmen;

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
use Orchid\Platform\Facades\Alert;

class CraftsmenController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $role = Role::where('slug', 'craftsmen')->first();
        $rawUsers = $role->users()->select('id')->get()->toArray();
        $tmp = [];
        foreach ($rawUsers as $item) {
            $tmp[] = $item['id'];
        }
        //$users = User::whereIn('id', $rawUsers)->get();
        $users = User::whereIn('id', $tmp)->get();

        if ($users->count() == 0) {
            abort(404);
        }

        return view('listings.craftsmen', [
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
        $typeObject = dashboard_posts()->where('slug', $typeRequest)->first() ?? abort(404);

        $elements = Post::where('type', $typeRequest)
            ->where('user_id', $user->id)
            ->whereNotNull('options->locale->'.App::getLocale())
            ->filtersApply($typeRequest)
            ->simplePaginate(5);

        return view('craftsmen.catalog', [
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
        $typeObject = dashboard_posts()->find('news') ?? abort(404);

        $elements = Post::where('type', 'news')
            ->where('user_id', $user->id)
            ->whereNotNull('options->locale->'.App::getLocale())
            ->filtersApply('news')
            ->simplePaginate(5);

        return view('craftsmen.news', [
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
        return view('craftsmen.gallery', [
            'gallery' => Post::type('gallery')->where('user_id', $user->id)->whereNotNull('content->'.App::getLocale())->with('attachment')->paginate(20),
            'user'    => $user,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        return view('craftsmen.edit', [
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

            $user->titz['avatar'] = '/storage/'.$date.'/'.$name.'.jpg';
        }

        $user->save();

        Alert::success('Вы успешно изменили профиль');

        return back();
    }
}
