<?php

namespace App\Http\Requests\Other;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class ReservationRequest extends FormRequest
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
            'date'     => 'date',
            'quantity' => 'integer',
            'user_id'  => 'integer',
        ];
    }

    /**
     * Get the proper failed validation response for the request.
     *
     * @param array $errors
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function response(array $errors)
    {
        if ($this->expectsJson()) {
            $errors = [
                'title'   => 'Ошибка',
                'message' => $errors['email'][0],
                'type'    => 'error',
            ];

            return new JsonResponse($errors, 422);
        }

        return $this->redirector->to($this->getRedirectUrl())
            ->withInput($this->except($this->dontFlash))
            ->withErrors($errors, $this->errorBag);
    }
}
