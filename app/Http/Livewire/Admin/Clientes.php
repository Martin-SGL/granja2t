<?php
namespace App\Http\Livewire\Admin;
use Livewire\Component;
use App\Models\Cliente;
use Livewire\WithPagination;

class Clientes extends Component
{
    use WithPagination;
    public $open=false, $open_destroy=false, $search, $pag=10;
    public $cliente_id, $nombre, $negocio, $telefono, $calle, $numero, $municipio_estado; 
    //Agregar o Editar
    public $action = 'Agregar', $cliente_inicial;

    protected $rules = [
        'nombre' => 'required|max:50',
        'negocio' => 'required|max:30',
        'telefono' => 'required|size:10',
        'calle' => 'required:max:45',
        'numero' => 'required|max:7',
        'municipio_estado' => 'required:50',
    ];

    protected $messages = [
        'nombre.required' => 'El campo nombre es requerido',
        'nombre.max' => 'El campo nombre es muy largo',
        'negocio.required' => 'El campo negocio es requerido',
        'negocio.max' => 'El campo negocio es muy largo',
        'telefono.required' => 'El campo télefono es requerido',
        'telefono.size' => 'El campo teléfono debe tener 10 dígitos',
        'calle.required' => 'El campo calle es requerido',
        'calle.max' => 'El campo calle es muy largo',
        'numero.required' => 'El campo numero es requerido',
        'numero.max' => 'El campo numero no debe pasar de 7 dígitos',
        'municipio_estado.required' => 'El campo municipio y estado es requerido',
        'municipio_estado.max' => 'El campo municipio y estado es muy largo'
        
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount(){
        $this->cliente_inicial = new Cliente();
    }

    public function render()
    {
        $clientes = Cliente::where('nombre','LIKE',"%$this->search%")
        ->orWhere('negocio', 'LIKE', '%' . $this->search . '%')
        ->orWhere('telefono', 'LIKE', '%' . $this->search . '%')
        ->orderBy('id','desc')
        ->paginate($this->pag);
        return view('livewire.admin.clientes', compact('clientes'));
    }

    public function store()
    {
        $this->validate();
        Cliente::create([
            'nombre' => $this->nombre,
            'negocio' => $this->negocio,
            'telefono' => $this->telefono,
            'calle' => $this->calle,
            'numero' => $this->numero,
            'municipio_estado' => $this->municipio_estado
        ]);

        $this->reset(['nombre','negocio','telefono','calle','numero','municipio_estado']);
        $this->emit('confirm','Cliente agregado con exito');
        $this->open = false;
    }

    public function edit(Cliente $cliente)
    {
        $this->resetValidation();
        $this->cliente_id = $cliente->id;
        $this->action = 'Editar';
        $this->open = true;
        $this->nombre = $cliente->nombre;
        $this->negocio = $cliente->negocio;
        $this->telefono = $cliente->telefono;
        $this->calle = $cliente->calle;
        $this->numero = $cliente->numero;
        $this->municipio_estado = $cliente->municipio_estado;
        
    }

    public function update()
    {
        $this->validate();
        Cliente::where('id', $this->cliente_id)
        ->update([
            'nombre' => $this->nombre,
            'negocio' => $this->negocio,
            'telefono' => $this->telefono,
            'calle' => $this->calle,
            'numero' => $this->numero,
            'municipio_estado' => $this->municipio_estado]);
        
        $this->reset(['open','nombre','negocio','telefono','calle','numero','municipio_estado']);
        $this->emit('confirm','Cliente actualizado con exito');
       
    }

    public function destroy(Cliente $cliente)
    {
        $this->open_destroy = true;
        $this->cliente_inicial = $cliente;
          
    }

    public function destroy_confirmation()
    {
        $this->cliente_inicial->delete();
        $this->resetValidation();
        $this->cliente_inicial = new Cliente();
        $this->reset('open_destroy');
        $this->emit('confirm','Cliente eliminado con exito');
        
    }

    public function init($open=false)
    {
        $this->open = $open;
        $this->resetValidation();
        $this->reset(['open_destroy','action','nombre','negocio','telefono','calle','numero','municipio_estado']);
    }
}
