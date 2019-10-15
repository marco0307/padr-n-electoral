<?php

namespace electoral\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MilitanteUpdateRequest extends FormRequest
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
            'cedula'=>'required|numeric',
            'fecha_nacimiento'=>'required',
            'sexo'=>'required',
            'provincia'=>'required',
            'municipio'=>'required',
            'sector'=>'required',
            'fecha_nacimiento'=>'required',
            'celular'=>'required|numeric',
            'ocupacion'=>'required',
            'cargo'=>'required',
            'grupo'=>'required',
            'foto'=>'mimes:png,jpg,jpeg',
            'cedula_pdf'=>'mimes:pdf',
            'formulario_fisico'=>'mimes:pdf',
        ];
    }

    public function messages()
    {
        return [
            'foto.mimes'=>'La foto de perfil debe ser un archivo con formato: png, jpg, jpeg.',
            'cedula_pdf.mimes'=>'La Cedula en PDF debe ser un archivo con formato: pdf.',
            'formulario_fisico.mimes'=>'El formulario fisico debe ser un archivo con formato: pdf.',
        ];
    }
}
