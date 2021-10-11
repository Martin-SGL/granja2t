<?php

namespace App\Http\Livewire\Admin;
use App\Models\Venta;
use App\Models\Cliente;
use Livewire\Component;
use Livewire\WithPagination;

class Ventas extends Component
{
    use WithPagination;
    public $open_destroy=false, $pag=10, $venta_eliminar, $readyToLoad = false;
    public $year, $month_search, $cliente_search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->venta_eliminar = New Venta();
        $this->venta_eliminar->id = 0;
        $this->year = date('Y');
    }

    public function render()
    {
        $simbol_month_search = $this->month_search==''?'!=':'=';
        $simbol_cliente_search = $this->cliente_search==''?'!=':'=';

        $clientes = Cliente::all();
        $ventas = Venta::whereYear('fecha',$this->year)->whereMonth('fecha',$simbol_month_search,$this->month_search)
            ->where('cliente_id',$simbol_cliente_search, $this->cliente_search)
            ->orderBy('fecha','desc')
            ->orderBy('id','desc')
            ->paginate($this->pag);

        $total = Venta::whereYear('fecha',$this->year)
        ->whereMonth('fecha',$simbol_month_search,$this->month_search)
        ->where('cliente_id',$simbol_cliente_search, $this->cliente_search)
        ->sum('total');

        return view('livewire.admin.ventas', compact('ventas','clientes','total'));
    }

    public function destroy(Venta $venta)
    {
        $this->open_destroy = true;
        $this->venta_eliminar = $venta;
    }

    public function confirm_destroy()
    {
        $this->venta_eliminar->delete();
        $this->venta_eliminar = New Venta();
        $this->emit('confirm','Venta eliminada con exito');
    }

}
