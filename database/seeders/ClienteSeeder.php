<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Cliente::create([
            'nombre' => 'Publico General',
            'negocio' => '-',
            'telefono' => 0000000000,
            'calle' => '-',
            'numero' => 0,
            'municipio_estado' => '-'
        ]);
        Cliente::create([
            'nombre' => 'Javier Solorzano Pérez',
            'negocio' => 'El Cahuite',
            'telefono' => 3123311234,
            'calle' => 'Guerrero',
            'numero' => 12,
            'municipio_estado' => 'Cuauhtemoc, Colima'
        ]);
        Cliente::create([
            'nombre' => 'Orlando Hernández Sánchez',
            'negocio' => 'Pescaderia Tecoman',
            'telefono' => 3133211234,
            'calle' => 'Chihuahua',
            'numero' => 54,
            'municipio_estado' => 'Tecoman, Colima'
        ]);
    }
}