<?php

namespace App\Http\Requests\CRM;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BidRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check() && !Auth::user()->inRole('organization');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',

            'company_name'     => 'required|max:255',
            'legal_address'    => 'required|max:255',
            'physical_address' => 'required|max:255',
            'head'             => 'required|max:255',
            'activity'         => 'required|max:255',
            'about'            => 'required|max:255',

            'accountant'        => 'required|max:255',
            'tin'               => 'required|max:10',
            'kipp'              => 'required|max:9',
            'bank_name'         => 'required|max:255',
            'ogrn'              => 'required|max:13',
            'checking_account'  => 'required|max:20',
            'corporate_account' => 'required|max:20',
            'bic'               => 'required|max:9',
            'okpo'              => 'required|max:10',
        ];
    }
}
