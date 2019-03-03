<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'    => Auth::check() ? 'sometimes|email|required' : 'sometimes|email|required|unique:users,email',
            'password' => Auth::check() ? 'sometimes' : 'sometimes|required|confirmed|max:255',
            'name'     => 'sometimes|required|max:255',
            'phone'    => 'sometimes|required|max:255',
            'delivery' => 'required|in:mail,courier',
            'comment'  => 'sometimes',
            'payment'  => 'required|in:cash,card,cashless',
            'zip'      => 'required|integer'
        ];
    }
}
