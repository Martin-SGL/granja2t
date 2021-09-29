<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empleado;
use App\Models\Temporada;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date('Y-m-d H:i:s');

        $empleado = Empleado::create([
            'nombre' => 'Juan José Sotmayor Amezcua',
            'telefono' => 3131231234,
            'calle' => 'Donato Guerra',
            'numero' => 74,
            'municipio_estado' => 'Armeria, Colima',
            'puesto_id' => 2,
            'salario_dia' => 102.5,
        ]);

        Temporada::create([
            'fecha' => $date,
            'empleado_id' => $empleado->id
        ]);

        $empleado= Empleado::create([
            'nombre' => 'Angel Leonardo Javier',
            'telefono' => 3121234321,
            'calle' => 'Chihuahua',
            'numero' => 74,
            'municipio_estado' => 'Tecoman, Colima',
            'puesto_id' => 1,
            'salario_dia' => 150,
        ]);

        Temporada::create([
            'fecha' => $date,
            'empleado_id' => $empleado->id
        ]);
    }
}
