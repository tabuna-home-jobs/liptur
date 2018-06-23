<?php

namespace App\Http\Controllers;

use App\Core\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null(Subscription::where('email', $request->email)->first())) {
            Subscription::create($request->all());
        }

        return response()->json([
            'title'   => 'Успешно',
            'message' => 'Данные сохранены',
            'type'    => 'success',
        ]);
    }
}