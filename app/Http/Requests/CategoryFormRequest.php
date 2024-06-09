<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    //Reglas de Validación
    public function rules(): array
    {
        return [
            'nombre' => [
                'required',
                'string'
            ],
            'urlP'=>[
                'required',
                'string'
            ],
            'descripcion'=>[
                'required',
            ],
            'imagen'=>[
                'nullable',
                'mimes:jpg,bmp,png'
            ],
            'meta_titulo'=>[
                'required',
                'string'
            ],
            'palabras_clave'=>[
                'required',
                'string'
            ],
            'meta_descripcion'=>[
                'required',
                'string'
            ],

        ];
    }
}
