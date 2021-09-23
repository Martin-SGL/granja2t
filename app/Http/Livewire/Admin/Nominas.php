<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Empleado;

class Nominas extends Component
{
    public $semana, $semana_ini, $semana_fin;
    public $empleado_id=array(), $salario=array(), $total=array(), $trabajo_pregunta=array(), $recurso=array();
    public $lun=array(), $mar=array(), $mie=array(), $jue=array(), $vie=array(), $sab=[], $dom=[];

    public function mount()
    {
        $this->semana = date('Y').'-W'.date('W');
        $empleados = Empleado::all();
        $i=0;
        foreach($empleados as $empleado){
            $this->salario[$i] = $empleado->salario_dia;
            $i++;
        }
    }

    public function render()
    {
        $empleados = Empleado::all();
        return view('livewire.admin.nominas', compact('empleados'));
    }

    public function get_date()
    {
        $this->semana_ini = date('Y-m-d', strtotime($this->semana));
        $this->semana_fin = date('Y-m-d', strtotime($this->semana. '+ 6 days'));
    }

    public function store()
    {


    }
}
