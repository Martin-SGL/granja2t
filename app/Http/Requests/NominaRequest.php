<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NominaRequest extends FormRequest
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
        $rules = [
            'salario.*' => 'required|max:8|not_in:0',
            'lunes.*' => 'required',
            'martes.*' => 'required',
            'miercoles.*' => 'required',
            'jueves.*' => 'required',
            'viernes.*' => 'required',
            'sabado.*' => 'required',
            'domingo.*' => 'required',
            'recurso.*' => 'required',
            'semana' => 'required|between:7,8',
            'id.*' => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'salario.*.required' => 'El campo sueldo es requerido',
            'salario.*.max' => 'El campo sueldo muy grande',
            'salario.*.not_in' => 'El campo sueldo debe ser diferente a 0',
        ];

        return $messages;
    }
}
