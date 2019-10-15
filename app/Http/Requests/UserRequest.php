<?php

namespace electoral\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'nombre'=>'required|max:190',
            'apellido'=>'required|max:190',
            'role_id'=>'required',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:6|max:150|required_with:password_confirm|same:password_confirm',
            'foto'=>'mimes:png,jpg,jpeg',
        ];
    }

    public function messages()
    {
        return [
            'role_id.required'=>'El campo tipo de usuario es obligatorio.',
            'foto.mimes'=>'La foto de perfil debe ser un archivo con formato: png, jpg, jpeg.',
            'password.same' => 'El campo contraseña y confirmar contraseña deben coincidir.',
        ];
    }
}
