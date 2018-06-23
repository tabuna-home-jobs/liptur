<?php

namespace App\Http\Controllers\Cfo;

use App\Core\Models\Post;
use App\Core\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Orchid\Alert\Facades\Alert;
use Orchid\Core\Models\Role;
use Orchid\Platform\Facades\Dashboard;

class CfoController extends Controller
{

    /**
     * AboutController constructor.
     */
    public function __construct()
    {
        $this->middleware('cache');
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $role = Role::where('slug', 'cfo')->first();
        $rawUsers = $role->users()->select('id')->get()->toArray();
        $tmp = [];
        foreach ($rawUsers as $item) {
            $tmp[] = $item['id'];
        }
        //$users = User::whereIn('id', $rawUsers)->get();
        $users = User::whereIn('id', $tmp)->get();
        return view('listings.cfo', [
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
        $typeObject = Dashboard::getPosts()->find($typeRequest) ?? abort(404);
        $elements = Post::where('type', $typeRequest)
            ->where('user_id', $user->id)
            ->whereNotNull('options->locale->' . App::getLocale())
            ->filtersApply($typeRequest)
            ->simplePaginate(5);
        return view('cfo.catalog', [
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function gallery(User $user)
    {

        return view('cfo.gallery', [
            'gallery' => Post::type('gallery')->where('user_id', $user->id)->whereNotNull('content->' . App::getLocale())->with('attachment')->paginate(20),
            'user'    => $user,
        ]);
    }

    public function invest(User $user)
    {
        return view('cfo.page', [
            'content' => isset($user->cfo['cfo'][App::getLocale()]['invest']) ? $user->cfo['cfo'][App::getLocale()]['invest'] : "Нет текста",
            'user'    => $user,
        ]);
    }

    public function contacts(User $user)
    {
        return view('cfo.page', [
            'content' => isset($user->cfo['cfo'][App::getLocale()]['contacts']) ? $user->cfo['cfo'][App::getLocale()]['contacts'] : "Нет текста",
            'user'    => $user,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        return view('cfo.edit', [
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

        $user->cfo = $request->all();

        if ($request->hasFile('avatar')) {
            $img = Image::make($request->file('avatar'));
            $img->resize(1920, 500, function ($constraint) {
                $constraint->aspectRatio();
            });

            $time = time();
            $date = date('Y/m/d');
            $name = str_random(40);

            Storage::disk('public')->makeDirectory($date);

            $name = sha1($time . $name);
            $fullPath = storage_path('app/public' . DIRECTORY_SEPARATOR . $date . DIRECTORY_SEPARATOR . $name . '.jpg');
            $img->save($fullPath, 60);

            $user->setAttribute('cfo->avatar', '/storage/' . $date . '/' . $name . '.jpg');
        }

        $user->save();

        Alert::success('Вы успешно изменили профиль');

        return back();

    }

}
