<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Empleado;

class Nominas extends Component
{
    public $semana;

    public function mount()
    {
        $week = date('W');
        $year = date('Y');
        $this->semana = $year.'-W'.$week;

    }

    public function render()
    {
        return view('livewire.admin.nominas');
    }

}
