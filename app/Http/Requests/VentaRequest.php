<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentaRequest extends FormRequest
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
        $rules =[
            'cliente_id' => 'required',
            'fecha' => 'required',
            'estanque_id'=> 'required',
            'piezas' => 'required|not_in:0',
            'kilos' => 'required|not_in:0',
            'precio' => 'required|not_in:0',
            'total' => 'required|not_in:0'
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'cliente_id.required' => 'El campo cliente es requerido',
            'fecha.required' => 'El campo cliente es requerido',
            'estanque_id.required' => 'El campo estanque es requerido',
            'piezas.required' => 'El campo piezas es requerido',
            'piezas.not_in' => 'El campo piezas debe ser mayor a 0',
            'kilos.required' => 'El campo kilos es requerido',
            'kilos.not_in' => 'El campo kilos debe ser mayor a 0',
            'precio.required' => 'El campo precio es requerido',
            'precio.not_in' => 'El campo precio debe ser mayor a 0',
            'total.required' => 'El campo total es requerido',
            'total.not_in' => 'El campo total debe ser mayor a 0',
        ];
    }
}
