<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Empleado;
use App\Models\Nomina;
use Livewire\WithPagination;

class Nominas extends Component
{
    use WithPagination;
    public $semana, $crear_nomina=true, $open=false, $cuenta, $pag=5;
    public $open_destroy = false, $nomina_eliminar;

    public function mount()
    {
        $week = date('W');
        $year = date('Y');
        $this->semana = $year.'-W'.$week;
        $this->nomina_eliminar = New Nomina();
        $this->nomina_eliminar->id = 0;
    }

    public function render()
    {
        $nominas = Nomina::paginate($this->pag);
        $total_nominas = Nomina::sum('total');
        return view('livewire.admin.nominas',compact('nominas','total_nominas'));
    }

    public function crear($semana)
    {
        $this->cuenta = Nomina::where('semana',$semana)->count();
        if($this->cuenta>0){
            $this->open=true;
        }else{
            return redirect()->route('admin.nominas.create',compact('semana'));
        }
    }

    public function destroy(Nomina $nomina)
    {
        $this->open_destroy = true;
        $this->nomina_eliminar = $nomina;
    }

    public function confirm_destroy()
    {
        $this->nomina_eliminar->delete();
        $this->nomina_eliminar = New Nomina();
        $this->emit('confirm','Nomina eliminada con exito');
    }

}
