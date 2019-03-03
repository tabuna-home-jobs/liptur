<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @param Guard $guard
     *
     * @return bool
     */
    public function authorize(Guard $guard)
    {
        return $guard->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = Auth::user();

        return [
            'name'         => 'sometimes|required|max:255',
            'email'        => 'sometimes|email|required|unique:users,email,'.$user->id,
            'avatar'       => 'mimes:jpeg,bmp,png|sometimes',
            'website'      => 'sometimes|active_url|max:255',
            'about'        => 'sometimes|max:65000',
            'notification' => 'sometimes|boolean',
            'sex'          => 'sometimes|boolean',
            'phone'        => 'sometimes|max:255',
        ];
    }
}
