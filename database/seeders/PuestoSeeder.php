<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Puesto;

class PuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Puesto::create([
            'nombre'=>'Velador',
            'lu' => 1,
            'ma' => 1,
            'mi' => 1,
            'ju' => 1,
            'vi' => 1,
            'do' => 1
        ]);
        Puesto::create([
            'nombre'=>'Operador',
            'lu' => 1,
            'ma' => 1,
            'mi' => 1,
            'ju' => 1,
            'vi' => 1,
            'sa' => 1
        ]);
        Puesto::create([
            'nombre'=>'Vendedor',
        ]);
        Puesto::create([
            'nombre'=>'Temporal',
        ]);
        Puesto::create([
            'nombre'=>'Apoyo',
            'sa' => 1,
            'do' => 1
        ]);
    }
}
