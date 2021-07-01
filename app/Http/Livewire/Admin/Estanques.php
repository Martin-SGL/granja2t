<?php

namespace App\Http\Livewire\Admin;
use Livewire\Component;
use App\Models\Estanque;
use Livewire\WithPagination;

class Estanques extends Component
{
    use WithPagination;
    public $open=false, $open_destroy=false, $pag=10;
    public $estanque_id, $nombre, $action= 'Agregar', $estanque_inicial;
    
    protected $rules = [
        'nombre' => 'required|max:20',
    ];

    protected $messages = [
        'nombre.required' => 'El campo nombre es requerido',
        'nombre.max' => 'El campo nombre es muy largo'
    ];
    
    public function mount(){
        $this->estanque_inicial = new Estanque();
    }
    public function render()
    {
        $estanques = Estanque::paginate($this->pag);
        return view('livewire.admin.estanques',compact('estanques'));
    }

    public function store()
    {
        $this->validate();
        Estanque::create([
            'nombre' => $this->nombre
        ]);

        $this->reset(['nombre']);
        $this->emit('confirm','Estanque agregado con exito');
        $this->open = false;
    }

    public function edit(Estanque $estanque)
    {
        $this->resetValidation();
        $this->estanque_id = $estanque->id;
        $this->nombre = $estanque->nombre;
        $this->action = 'Editar';
        $this->open = true;
        
    }

    public function update()
    {
        $this->validate();
        Estanque::where('id', $this->estanque_id)
        ->update([
            'nombre' => $this->nombre]);
        
        $this->reset(['open','nombre']);
        $this->emit('confirm','Estanque actualizado con exito');
       
    }

    public function destroy(Estanque $estanque)
    {
        $this->open_destroy = true;
        $this->estanque_inicial = $estanque;
          
    }

    public function destroy_confirmation()
    {
        $this->estanque_inicial->delete();
        $this->resetValidation();
        $this->estanque_inicial = new Estanque();
        $this->reset('open_destroy');
        $this->emit('confirm','Estanque eliminado con exito');
        
    }

    public function init($open=false)
    {
        $this->open = $open;
        $this->resetValidation();
        $this->reset(['open_destroy','action','nombre']);
    }
}
