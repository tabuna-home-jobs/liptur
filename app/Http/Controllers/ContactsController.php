<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupportRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('pages.contact', [
            'page' => getPage('contact'),
        ]);
    }

    public function store(Request $request)
    {
        /*
        $this->validate($request, [
            'g-recaptcha-response' => 'required|captcha',
        ]);
        */
        try {
            $send = Mail::send('emails.contact', ['request' => $request->all()], function ($message) use ($request) {
                $message
                    ->to(setting('contact_email'))
                    ->subject('Сообщение с веб-сайта');
            });
        } catch(\Exception $e){
            return response()->json([
                'title'   => 'Ошибка',
                'message' => 'Не удалось отправить сообщение, свяжитесь другим способом',
                'type'    => 'error',
            ]);
        }


        return response()->json([
            'title'   => 'Успешно',
            'message' => 'Запрос отправлен',
            'type'    => 'success',
        ]);
    }

    /**
     * @param SupportRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(SupportRequest $request)
    {
        Mail::send('emails.support', ['request' => $request->all()], function ($message) use ($request) {
            $message
                ->to(setting('contact_email'))
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
