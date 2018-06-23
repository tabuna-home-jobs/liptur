<?php

namespace App\Http\Controllers\Auth;

use App\Core\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

/**
 * Class UloginController
 */
class UloginController extends Controller
{

    /**
     * Login user through social network.
     *
     * UloginController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('cache');
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function login(Request $request)
    {

        //Get information about user.

        $data = file_get_contents('http://ulogin.ru/token.php?token=' . $request->get('token') . '&host=' . $_SERVER['HTTP_HOST']);

        $user = json_decode($data, true);

        //Find user in DB
        $userData = User::where('email', $user['email'])->first();

        //If user exist
        if (isset($userData->id)) {

            $this->guard()->login($userData);

            return Redirect::back();

        } else {

            //Create new user in DB
            $newUser = User::create([
                'name'     => $user['first_name'] . ' ' . $user['last_name'],
                'avatar'   => $user['photo'],
                'identity' => $user['identity'],
                'email'    => $user['email'],
                'password' => bcrypt(Hash::make(str_random(8))),
            ]);

            event(new Registered($newUser));
            $this->guard()->login($newUser);
            return Redirect::back();
        }
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
