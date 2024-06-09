<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderFormRequest extends FormRequest
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
            'titulo'=>[
                'required',
                'string'
            ],
            'descripcion'=>[
                'required',
                'string'
            ],
            'imagen'=>[
                'nullable',
                'image',
                'mimes:jpg,jpeg,png'
            ],
            'status'=>[
                'nullable',
            ],

        ];
    }
}
