<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Empleado;
use App\Models\Nomina;
use Livewire\WithPagination;

class Nominas extends Component
{
    use WithPagination;
    public $semana, $crear_nomina=true, $open=false, $cuenta;

    public function mount()
    {
        $week = date('W');
        $year = date('Y');
        $this->semana = $year.'-W'.$week;
    }

    public function render()
    {
        $nominas = Nomina::all();
        return view('livewire.admin.nominas',compact('nominas'));
    }

    public function crear($semana)
    {
        $this->cuenta = Nomina::where('semana',$semana)->count();

        if($this->cuenta>0){
            $this->open=true;
        }
    }

}
