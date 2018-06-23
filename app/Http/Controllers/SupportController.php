<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupportRequest;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{
    /**
     * @param SupportRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(SupportRequest $request)
    {
        Mail::send('emails.support', ['request' => $request->all()], function ($message) use ($request) {
            $message
                ->to(Config::get('link.email'))
                ->subject('Сообщение с веб-сайта');

            if (!is_null($request->file('upload'))) {
                $message->attach($request->file('upload'), [
                    'as'   => $request->file('upload')->getClientOriginalName(),
                    'mime' => $request->file('upload')->getMimeType(),
                ]);
            }
        });

        return response()->json([
            'title'   => 'Успешно',
            'message' => 'Данные сохранены',
            'type'    => 'success',
        ]);
    }
}