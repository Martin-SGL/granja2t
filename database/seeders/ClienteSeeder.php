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
    }
}