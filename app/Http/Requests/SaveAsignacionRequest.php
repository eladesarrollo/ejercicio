<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveAsignacionRequest extends FormRequest
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
            'cooperante_id' => ['required'],
            'proyecto_id'  => ['required'],
            'fechaAsignacion'  => ['required'],
            'monto'  => ['required','gt:0']
        ];
    }

    public function messages(){
        return [
            'cooperante_id.required' => 'Favor seleccionar el cooperante',
            'proyecto_id.required' => 'Favor seleccionar el proyecto',
            'fechaAsignacion.required' => 'Favor digitar la fecha de asignación',
            'fechaAsignacion.monto' => 'Favor digitar el monto'
        ];
    }
}
