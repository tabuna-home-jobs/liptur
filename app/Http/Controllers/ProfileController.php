<?php

namespace App\Http\Controllers;

use App\Core\Models\Post;
use App\Http\Requests\AccountPasswordRequest;
use App\Http\Requests\AccountRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Orchid\Platform\Core\Models\Comment;
use Orchid\Platform\Facades\Alert;

class ProfileController extends Controller
{
    protected $user;

    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cache');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('profile.edit', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function password()
    {
        return view('profile.password', [
            'user' => $this->user,
        ]);
    }

    /**
     * Обновление профиля.
     *
     * @param AccountRequest $account
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(AccountRequest $account)
    {
        $user = Auth::user();

        if ($account->hasFile('avatar')) {
            $img = Image::make($account->file('avatar'));
            $img->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $time = time();
            $date = date('Y/m/d');
            $name = str_random(40);

            Storage::disk('public')->makeDirectory($date);

            $name = sha1($time.$name);
            $fullPath = storage_path('app/public'.DIRECTORY_SEPARATOR.$date.DIRECTORY_SEPARATOR.$name.'.jpg');
            $img->save($fullPath, 60);

            $user->avatar = '/storage/'.$date.'/'.$name.'.jpg';
        }

        $user->fill($account->except('avatar'));
        $user->save();

        Alert::success('Вы успешно изменили профиль');

        return back();
    }

    /**
     * Обновление пароля пользователя.
     *
     * @param AccountPasswordRequest $account
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(AccountPasswordRequest $account)
    {
        $user = Auth::user();
        $user->password = bcrypt($account->password);
        $user->save();

        Alert::success('Ваш пароль успешно изменён');

        return back();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function comments()
    {
        return view('profile.comments', [
            'comments' => Comment::where('user_id', Auth::user()->id)->with('post')->orderBy('id', 'DESC')->paginate(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function liked()
    {
        return view('profile.liked', [
            'posts' => Post::whereLikedBy(Auth::user()->id)->with('likeCounter')->paginate(),
        ]);
    }

    /**
     * Форма заявки на организацию.
     */
    public function bid()
    {
        return view('profile.bid', [
            'user' => Auth::user(),
        ]);
    }
}
