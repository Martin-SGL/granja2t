<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Gasto;
use App\Models\Alimento;
use App\Models\Energia;
use App\Models\Alevin;
use App\Models\Vario;

class Gastos extends Component
{
    public $open_alimento=false, $action_alimento='Agregar', $tipo_alimento='Grano', $precio_alimento, $cantidad_alimento; //variables de alimento
    public $open_energia=false, $action_energia='Agregar', $blower, $pozo, $domestica; //variables de energia
    public $open_alevin=false, $action_alevin='Agregar', $precio_alevin, $cantidad_alevin; //variables de alimento
    public $open_varios=false, $action_varios='Agregar', $precio_varios, $descripcion; //variables de gastos varios
    public $fecha, $recurso='1', $gasto_inicial; //vaiables de gastos
    public $tipo_modal = 1, $open_destroy=false; //variables de modales

    protected $rules = [], $messages = [];

    public function mount(){
        $this->fecha = date('Y-m-d');
        $this->gasto_inicial = new Gasto();
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
        else if($this->tipo_modal==2){
            $this->open_energia=true;
        }
        else if($this->tipo_modal==3){
            $this->open_alevin=true;
        }
        else{
            $this->open_varios=true;
        }
    }

    public function store_alimento()
    {
        $this->rules = [
            'fecha' => 'required',
            'tipo_alimento' => 'required',
            'cantidad_alimento' => 'required|max:8|not_in:0',
            'precio_alimento' => 'required|max:8|not_in:0',
            'recurso' => 'required',
        ];

        $this->messages = [
            'fecha.required' => 'El campo fecha es requerido',
            'tipo_alimento.required' => 'El campo tipo es requerido',
            'cantidad_alimento.required' => 'El campo cantidad es requerido',
            'cantidad_alimento.max' => 'El campo cantidad es muy grande',
            'cantidad_alimento.not_in' => 'El campo cantidad debe ser mayor a 0',
            'precio_alimento.required' => 'El campo precio es requerido',
            'precio_alimento.max' => 'El campo precio es muy grande',
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

        $this->reset(['open_alimento','tipo_alimento','precio_alimento','cantidad_alimento','recurso']);
        $this->fecha = date('Y-m-d');
        $this->emit('confirm','Gasto agregado con exito');

    }

    public function store_energia()
    {
        $this->rules = [
            'fecha' => 'required',
            'blower' => 'required|max:8|not_in:0',
            'pozo' => 'required|max:8|not_in:0',
            'domestica' => 'required|max:8|not_in:0',
            'recurso' => 'required',
        ];

        $this->messages = [
            'fecha.required' => 'El campo fecha es requerido',
            'blower.required' => 'El campo blower es requerido',
            'blower.max' => 'El campo blower es muy grande',
            'blower.not_in:0' => 'El campo blower debe ser mayor a 0',
            'pozo.required' => 'El campo pozo es requerido',
            'pozo.max' => 'El campo pozo es muy grande',
            'pozo.not_in' => 'El campo pozo debe ser mayor a 0',
            'domestica.required' => 'El campo dómestica es requerido',
            'domestica.max' => 'El campo dómestica es muy grande',
            'domestica.not_in' => 'El campo dómestica debe ser mayor a 0',
            'recurso.required' => 'El campo recurso es requerido'
        ];

        $this->validate();
        $energia = Energia::create([
            'blower' => $this->blower,
            'pozo' => $this->pozo,
            'domestica' => $this->domestica
        ]);

        $energia->gasto()->create([
            'fecha'=> $this->fecha,
            'total'=> ($this->blower + $this->pozo + $this->domestica),
            'recurso'=> $this->recurso
        ]);

        $this->reset(['open_energia','blower','pozo','domestica','recurso']);
        $this->fecha = date('Y-m-d');
        $this->emit('confirm','Gasto agregado con exito');

    }

    public function store_alevin()
    {
        $this->rules = [
            'fecha' => 'required',
            'cantidad_alevin' => 'required|max:10|not_in:0',
            'precio_alevin' => 'required|max:8|not_in:0',
            'recurso' => 'required',
        ];

        $this->messages = [
            'fecha.required' => 'El campo fecha es requerido',
            'cantidad_alevin.required' => 'El campo cantidad es requerido',
            'cantidad_alevin.max' => 'El campo cantidad es muy grande',
            'cantidad_alevin.not_in:0' => 'El campo cantidad debe ser mayor a 0',
            'precio_alevin.required' => 'El campo precio es requerido',
            'precio_alevin.max' => 'El campo precio es muy grande',
            'precio_alevin.not_in' => 'El campo precio debe ser mayor a 0',
            'recurso.required' => 'El campo recurso es requerido'
        ];

        $this->validate();
        $alevin = Alevin::create([
            'cantidad' => $this->cantidad_alevin,
            'precio_u' => $this->precio_alevin,
        ]);

        $alevin->gasto()->create([
            'fecha'=> $this->fecha,
            'total'=> ($this->cantidad_alevin * $this->precio_alevin),
            'recurso'=> $this->recurso
        ]);

        $this->reset(['open_alevin','cantidad_alevin','precio_alevin','recurso']);
        $this->fecha = date('Y-m-d');
        $this->emit('confirm','Gasto agregado con exito');

    }

    public function store_varios()
    {
        $this->rules = [
            'fecha' => 'required',
            'descripcion' => 'required|max:100',
            'precio_varios' => 'required|max:10|not_in:0',
            'recurso' => 'required',
        ];

        $this->messages = [
            'fecha.required' => 'El campo fecha es requerido',
            'descripcion.required' => 'El campo descripción es requerido',
            'descripcion.max' => 'El campo descripción es muy grande',
            'precio_varios.required' => 'El campo precio es requerido',
            'precio_varios.max' => 'El campo precio es muy grande',
            'precio_varios.not_in' => 'El campo precio debe ser mayor a 0',
            'recurso.required' => 'El campo recurso es requerido'
        ];

        $this->validate();
        $varios = Vario::create([
            'descripcion' => $this->descripcion,
        ]);

        $varios->gasto()->create([
            'fecha'=> $this->fecha,
            'total'=> $this->precio_varios,
            'recurso'=> $this->recurso
        ]);

        $this->reset(['open_varios','descripcion','precio_varios','recurso']);
        $this->fecha = date('Y-m-d');
        $this->emit('confirm','Gasto agregado con exito');

    }

    public function destroy(Gasto $gasto)
    {
        $this->open_destroy = true;
        $this->gasto_inicial = $gasto;

    }

    public function destroy_confirmation()
    {
        $this->gasto_inicial->delete();
        $this->gasto_inicial = new Gasto();
        $this->reset('open_destroy');
        $this->emit('confirm','Gasto eliminado con exito');

    }
}
