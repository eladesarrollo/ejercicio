<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveProyectoRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombre' => ['required'],
            'descripcion'  => ['required'],            
        ];
    }

    public function messages(){
        return [
            'nombre.required' => 'Favor digitar el nombre',
            'descripcion.required' => 'Favor digitar el email',            
        ];
    }
}
