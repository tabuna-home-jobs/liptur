<?php

namespace App\Http\Requests;

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
            'email'    => 'sometimes|email|required|unique:users,email',
            'name'     => 'sometimes|required|max:255',
            'password' => 'sometimes|required|max:255',
            'phone'    => 'sometimes|max:255',
            'delivery' => 'required|in:mail,courier',
            'comment'  => 'sometimes',
            'payment'  => 'required|in:cash',
        ];
    }
}
