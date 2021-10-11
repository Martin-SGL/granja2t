<?php

namespace App\Http\Livewire\Admin;
use Livewire\Component;
use App\Models\Merma;
use App\Models\Estanque;
use Livewire\WithPagination;

class Mermas extends Component
{
    use WithPagination;
    public $open=false, $open_destroy=false, $pag=10;
    public $merma_id, $fecha, $cantidad, $estanque_merma, $action= 'Agregar', $merma_inicial;
    public $year, $month_search, $estanque_search;
    public $mode=1; #1 = resumen #2 = detalle

    protected $rules = [
        'cantidad' => 'required|max:10|not_in:0',
        'fecha' => 'required',
        'estanque_merma' => 'required'
    ];

    protected $messages = [
        'cantidad.required' => 'El campo cantidad es requerido',
        'cantidad.max' => 'El campo cantidad es muy grande',
        'cantidad.not_in' => 'El campo cantidad debe ser mayor a 0',
        'fecha.required' => 'El campo fecha es requerido',
        'estanque_merma.required' => 'El campo estanque es requerido'
    ];

    public function mount(){
        $this->merma_inicial = new Merma();
        $this->fecha = date('Y-m-d');
        $this->year = date('Y');
    }

    public function render()
    {
        $simbol_month_search = $this->month_search==''?'!=':'=';
        $simbol_estanque_search = $this->estanque_search==''?'!=':'=';

        $total = Merma::sum('cantidad');
        $mermas = Merma::whereYear('fecha',$this->year)->whereMonth('fecha',$simbol_month_search,$this->month_search)
            ->where('estanque_id',$simbol_estanque_search,$this->estanque_search)
            ->orderBy('fecha','desc')
            ->orderBy('id','desc')
            ->paginate($this->pag);
        $estanques = Estanque::where('tipo',1)->get(); #tipo 1 para los estanques inernos
        return view('livewire.admin.mermas',compact('mermas','estanques','total'));
    }

    public function store()
    {
        $this->validate();
        Merma::create([
            'fecha' => $this->fecha,
            'cantidad' => $this->cantidad,
            'estanque_id' => $this->estanque_merma
        ]);

        $this->reset(['fecha','cantidad','estanque_merma','open']);
        $this->emit('confirm','Merma agregada con exito');
    }

    public function edit(Merma $merma)
    {
        $this->resetValidation();
        $this->merma_id = $merma->id;
        $this->fecha = $merma->fecha;
        $this->cantidad = $merma->cantidad;
        $this->estanque_merma = $merma->estanque_id;
        $this->action = 'Editar';
        $this->open = true;

    }

    public function update()
    {
        $this->validate();
        Merma::where('id', $this->merma_id)
        ->update([
            'fecha' => $this->fecha,
            'cantidad' => $this->cantidad,
            'estanque_id' =>  $this->estanque_merma
        ]);

        $this->fecha = date('Y-m-d');
        $this->reset(['cantidad','estanque_merma','open']);
        $this->emit('confirm','Merma actualizada con exito');

    }

    public function destroy(Merma $merma)
    {
        $this->open_destroy = true;
        $this->merma_inicial = $merma;

    }

    public function destroy_confirmation()
    {
        $this->merma_inicial->delete();
        $this->merma_inicial = new Merma();
        $this->reset('open_destroy');
        $this->emit('confirm','Merma eliminada con exito');

    }

    public function init($open=false)
    {
        $this->open = $open;
        $this->resetValidation();
        $this->fecha = date('Y-m-d');
        $this->reset(['open_destroy','action','cantidad','estanque_merma']);
    }
}
