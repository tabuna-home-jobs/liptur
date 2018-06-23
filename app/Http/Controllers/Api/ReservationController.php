<?php

namespace App\Http\Controllers\Api;

use App\Core\Models\Post;
use App\Core\Models\Reservation;
use App\Core\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Other\ReservationRequest;
use App\Mail\MailReservationObject;
use App\Mail\MailReservationUser;
use Illuminate\Support\Facades\Mail;

/**
 * TODO::
 *
 * Class ReservationController
 * @package App\Http\Controllers\Api
 */
class ReservationController extends Controller
{

    /**
     * @param ReservationRequest $request
     *
     * @return mixed
     */
    public function subscription(ReservationRequest $request)
    {
        $user_id = $request->input("user_id");
        $post_id = $request->input("post_id");
        $user = User::find($user_id);
        $post = Post::find($post_id);
        $reservation = Reservation::create($request->all());
        $post_user_id = $post->user_id;
        $post_user = User::find($post_user_id);

        $user_email = $user->email;
        $post_url = "";
        if (isset($_SERVER["HTTP_REFERER"])) {
            $post_url = $_SERVER["HTTP_REFERER"];
        }

        if ($post) {
            $post_email = $post_user->email;
            $param = [
                "user"        => $user,
                "post"        => $post,
                "reservation" => $reservation,
                "post_url"    => $post_url,
                "post_email"  => $post_email,
            ];
            $message = (new MailReservationObject($param));
            if (isset($post_email) && $post_email) {
                Mail::to($post_email)->cc("tourclaster@liptur.ru")->send($message);
            } else {
                $post_email = "tourclaster@liptur.ru";
                Mail::to($post_email)->send($message);
            }

            if (isset($user_email) && $user_email) {
                $message = (new MailReservationUser($param));
                Mail::to($user_email)->send($message);
            }
        }
        return response()->json([
            'title'   => 'Успешно',
            'message' => 'Данные сохранены',
            'type'    => 'success',
        ]);

    }
}
