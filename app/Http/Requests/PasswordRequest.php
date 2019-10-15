<?php

namespace electoral\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'password_actual'=>'required|string|max:150',
            'password'=>'required|string|min:6|max:150|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation'=>'required|string|min:6|max:150',
        ];
    }

    public function messages()
    {
        return [
            'password_actual.required'=>'El campo contraseña actual es obligatorio.',
        ];
    }
}
