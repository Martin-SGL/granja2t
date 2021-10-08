<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Gasto;
use App\Models\Alimento;

class Gastos extends Component
{
    public $open_alimento=false, $action_alimento='Agregar', $tipo_alimento='Grano', $precio_alimento, $cantidad_alimento; //variables de alimento
    public $fecha, $total, $gasto, $recurso='1'; //vaiables de gastos
    public $tipo_modal = 1; //variables de modales

    protected $rules = [], $messages = [];

    public function mount(){
        $this->fecha = date('Y-m-d');
    }

    public function render()
    {
        $gastos = Gasto::all();
        return view('livewire.admin.gastos',compact('gastos'));
    }

    public function modales()
    {
        if($this->tipo_modal==1){
            $this->open_alimento=true;
        }
    }

    public function store_alimento()
    {
        $this->rules = [
            'fecha' => 'required',
            'tipo_alimento' => 'required',
            'cantidad_alimento' => 'required|max:8|not_in:0',
            'precio_alimento' => 'required|not_in:0',
            'recurso' => 'required',
        ];

        $this->messages = [
            'fecha.required' => 'El campo fecha es requerido',
            'tipo_alimento.required' => 'El campo tipo es requerido',
            'cantidad_alimento.required' => 'El campo cantidad es requerido',
            'cantidad_alimento.max' => 'El campo cantidad es muy grande',
            'cantidad_alimento.not_in' => 'El campo cantidad debe ser mayor a 0',
            'precio_alimento.required' => 'El campo precio es requerido',
            'precio_alimento.not_in' => 'El campo precio debe ser mayor a 0',
            'recurso.required' => 'El campo recurso es requerido'
        ];

        $this->validate();
        $alimento = Alimento::create([
            'tipo' => $this->tipo_alimento,
            'precio_u' => $this->precio_alimento,
            'cantidad' => $this->cantidad_alimento
        ]);

        $alimento->gasto()->create([
            'fecha'=> $this->fecha,
            'total'=> ($this->precio_alimento * $this->cantidad_alimento),
            'recurso'=> $this->recurso
        ]);

        $this->reset(['open_alimento','tipo_alimento','precio_alimento','cantidad_alimento','fecha','recurso']);
        $this->emit('confirm','Gasto agregada con exito');

    }
}
