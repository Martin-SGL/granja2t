<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Empleado;
use App\Models\Temporada;
use Livewire\WithPagination;

class Empleados extends Component
{
    use WithPagination;
    public $open=false, $open_destroy=false, $pag=10;
    public $empleado_id, $nombre, $telefono, $calle, $numero, $municipio_estado, $puesto, $salario_dia, $fecha, $estatus; 
    //Agregar o Editar
    public $action = 'Agregar', $empleado_inicial;

    protected $rules = [
        'nombre' => 'required|max:50',
        'telefono' => 'required|size:10',
        'calle' => 'required:max:45',
        'numero' => 'required|max:7',
        'municipio_estado' => 'required|max:45',
        'puesto' => 'required|max:20',
        'salario_dia' => 'required|max:8',
        'fecha' => 'required'
    ];

    protected $messages = [
        'nombre.required' => 'El campo nombre es requerido',
        'nombre.max' => 'El campo nombre es muy largo',
        'telefono.required' => 'El campo télefono es requerido',
        'telefono.size' => 'El campo teléfono debe tener 10 dígitos',
        'calle.required' => 'El campo calle es requerido',
        'calle.max' => 'El campo calle es muy largo',
        'numero.required' => 'El campo numero es requerido',
        'numero.max' => 'El campo numero no debe pasar de 7 dígitos',
        'municipio_estado.required' => 'El campo municipio y estado es requerido',
        'municipio_estado.max' => 'El campo municipio y estado es muy largo',
        'puesto.required' => 'El campo puesto es requerido',
        'puesto.max' => 'El campo puesto es muy largo',
        'salario_dia.required' => 'El campo salario por dia es requerido',
        'salario_dia.max' => 'El campo salario por dia no debe tener mas de 8 digitos',
        'fecha.required' => 'El campo fecha es requerido'
        
    ];

    public function mount()
    {
        $this->fecha = date('Y-m-d');
        $this->empleado_inicial = new Empleado();
    }

    public function render()
    {
        $empleados = Empleado::paginate($this->pag);
        return view('livewire.admin.empleados', compact('empleados'));
    }

    public function store()
    {
        $this->validate();

        $empleado= Empleado::create([
            'nombre' => $this->nombre,
            'telefono' => $this->telefono,
            'calle' => $this->calle,
            'numero' => $this->numero,
            'municipio_estado' => $this->municipio_estado,
            'puesto' => $this->puesto,
            'salario_dia' => $this->salario_dia,
            'salario' => $this->salario_dia,
        ]);

        Temporada::create([
            'fecha' => $this->fecha,
            'empleado_id' => $empleado->id
        ]);

        $this->fecha = date('Y-m-d');
        $this->reset(['open','open_destroy','action','nombre','telefono','calle','numero','municipio_estado','puesto','salario_dia']);
        $this->emit('confirm','Empleado agregado con exito');
    }

    public function edit(Empleado $empleado)
    {
        $this->resetValidation();
        $this->empleado_id = $empleado->id;
        $this->action = 'Editar';
        $this->open = true;
        $this->nombre = $empleado->nombre;
        $this->telefono = $empleado->telefono;
        $this->calle = $empleado->calle;
        $this->numero = $empleado->numero;
        $this->municipio_estado = $empleado->municipio_estado;
        $this->puesto = $empleado->puesto;
        $this->salario_dia = $empleado->salario_dia;
        $this->fecha  = $empleado->temporadas->last()->fecha;
        
    }

    public function update()
    {
        $this->validate();
        Empleado::where('id', $this->empleado_id)
        ->update([
            'nombre' => $this->nombre,
            'telefono' => $this->telefono,
            'calle' => $this->calle,
            'numero' => $this->numero,
            'municipio_estado' => $this->municipio_estado,
            'puesto' => $this->puesto,
            'salario_dia' => $this->salario_dia,
        ]);

        Temporada::where('id', $this->empleado_id)
        ->update([
            'fecha' => $this->fecha
        ]);

        $this->fecha = date('Y-m-d');
        $this->reset(['open','open_destroy','action','nombre','telefono','calle','numero','municipio_estado','puesto','salario_dia']);
        $this->emit('confirm','Empleado actualizado con exito');

    }

    public function destroy(Empleado $empleado)
    {
        $this->open_destroy = true;
        $this->empleado_inicial = $empleado;
          
    }

    public function destroy_confirmation()
    {
        $this->empleado_inicial->delete();
        Temporada::create([
            'tipo' => '0',
            'fecha' => $this->fecha,
            'empleado_id' => $this->empleado_inicial->id
        ]);

        $this->empleado_inicial = new Empleado();
        $this->reset('open_destroy');
        $this->emit('confirm','Cliente eliminado con exito');
        
    }


    public function init($open=false)
    {
        $this->open = $open;
        $this->resetValidation();
        $this->fecha = date('Y-m-d');
        $this->reset(['open_destroy','action','nombre','telefono','calle','numero','municipio_estado','puesto','salario_dia']);
    }
}
