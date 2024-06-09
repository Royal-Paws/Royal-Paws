<?php

namespace App\Http\Requests;
 
use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'category_id'=>['required','integer'],
            'nombre'=>['required','string'],
            'urlP'=>['required','string'],
            'descripcion_breve'=>['required','string'],
            'descripcion'=>['required','string'],
            'precio_original'=>['required','integer'],
            'precio_venta'=>['required','integer'],
            'talla'=>['required','string'],
            'status'=>['nullable','integer'],
            'meta_titulo'=>['required','string'],
            'palabras_clave'=>['required','string'],
            'meta_descripcion'=>['required','string'],

            'imagen' => ['nullable'],
            
            
    
        ];

    }
}
