<?php

namespace App\Http\Controllers\CRM;

use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\CRM\BidRequest;
use App\Mail\Info;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Orchid\Platform\Models\Role;
use Orchid\Support\Facades\Alert;

class BidController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $bids = Post::type('bid')->simplePaginate();

        return view('dashboard.bids', [
            'bids' => $bids,
        ]);
    }

    /**
     * @param BidRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BidRequest $request)
    {
        Post::create([
            'user_id'    => Auth::user()->id,
            'type'       => 'bid',
            'section_id' => 0,
            'content'    => $request->all(),
            'status'     => 'publish',
            'options'    => [],
            'slug'       => SlugService::createSlug(Post::class, 'slug', $request->get('company_name')),
        ]);

        Mail::queue(new Info(
            $request->get('email'),
            'Заявка юридического лица на сайте LipTur.ru',
            'Ваша заявка получена и находиться на расмотрении, в ближайшее время мы свяжемся по указанным данным'
        ));

        Alert::success('Мы обработаем вашу заявку и свяжемся в ближайшее время');

        return back();
    }

    /**
     * @param Post $post
     *
     * @return mixed
     */
    public function success(Post $post)
    {
        $organizationRole = Role::where('slug', 'organization')->first();
        $user = User::findOrFail($post->user_id);
        $user->addRole($organizationRole);
        $user->organization = $post->content;
        $user->save();

        Post::where([
            'type'    => 'bid',
            'user_id' => $user->id,
        ])->delete();

        Mail::queue(new Info(
            $user->email,
            'Заявка юридического лица на сайте LipTur.ru',
            'Ваша заявка была одобрена и аккаунт был преобразован в организацию'
        ));

        //Отправка на почту
        return back();
    }

    /**
     * @param Post $post
     *
     * @return mixed
     */
    public function deny(Post $post)
    {
        //Отправка на почту
        Mail::queue(new Info(
            User::findOrFail($post->user_id)->email,
            'Заявка юридического лица на сайте LipTur.ru',
            'Ваша заявка на создание организации была отклонена'
        ));
        $post->delete();

        return back();
    }
}
