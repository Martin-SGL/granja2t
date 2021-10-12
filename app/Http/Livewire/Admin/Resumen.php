<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Venta;
use App\Models\Nomina;
use App\Models\Gasto;

class Resumen extends Component
{
    public $month_search='',$year;

    public function mount()
    {
        $this->year = date('Y');
    }

    public function render()
    {
        $simbol_month_search = $this->month_search==''?'!=':'=';
        $week_format = date('y-ww',strtotime("Y-".$this->month_search.""));


        $venta_total = Venta::whereYear('fecha',$this->year)
        ->whereMonth('fecha',$simbol_month_search,$this->month_search)
        ->sum('total');

        $nomina_total = Nomina::whereYear('fecha_ini',$this->year)
        ->whereMonth('fecha_ini',$simbol_month_search,$this->month_search)
        ->sum('total');

        $gasto_total = Gasto::whereYear('fecha',$this->year)
        ->whereMonth('fecha',$simbol_month_search,$this->month_search)
        ->sum('total');

        $total_utilidad =$venta_total - $nomina_total - $gasto_total;


        return view('livewire.admin.resumen', compact('total_utilidad','venta_total','gasto_total','nomina_total'));
    }
}
