<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Other\NewsletterRequest;
use Orchid\Models\Newsletter;

class NewsletterController extends Controller
{
    /**
     * @param NewsletterRequest $request
     *
     * @return mixed
     */
    public function subscription(NewsletterRequest $request)
    {
        Newsletter::create($request->all());

        return response()->json([
            'title'   => 'Успешно',
            'message' => 'Данные сохранены',
            'type'    => 'success',
        ]);
    }
}
