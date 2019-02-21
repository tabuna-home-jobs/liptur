<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Forms\Advertising\AdvertisingFormGroup;
use Illuminate\Http\Request;
use Orchid\Press\Models\Post;
use Orchid\Platform\Facades\Alert;
use Orchid\Platform\Http\Controllers\Controller;

class AdvertisingController extends Controller
{
    /**
     * @var AdvertisingFormGroup
     */
    public $form;

    /**
     * AdvertisingController constructor.
     *
     * @param AdvertisingFormGroup $form
     */
    public function __construct(AdvertisingFormGroup $form)
    {
        //$this->checkPermission('dashboard.marketing.advertising');
        $this->form = $form;
    }

    /**
     * @return string
     */
    public function index()
    {
        return $this->form->grid();
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return $this->form
            ->route('dashboard.marketing.advertising.store')
            ->method('POST')
            ->render();
    }

    /**
     * @param Request   $request
     * @param Post|null $post
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Post $post = null)
    {

        $this->form->save($request, $post);
        Alert::success('Блок сохранён');

        return back();
    }

    /**
     * @param Post $post
     *
     * @return mixed
     */
    public function edit(Post $post)
    {
        return $this->form
            ->route('dashboard.marketing.advertising.update')
            ->slug($post->id)
            ->method('PUT')
            ->render($post);
    }

    /**
     * @param Request $request
     * @param Post    $user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Post $user)
    {
        $this->form->save($request, $user);
        Alert::success('Блок сохранён');

        return back();
    }

    /**
     * @param Post $user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $user)
    {
        $this->form->remove($user);
        Alert::success('Блок сохранён');

        return redirect()->route('dashboard.marketing.users');
    }
}
