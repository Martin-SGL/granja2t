<?php

namespace Database\Seeders;
use App\Models\Estanque;
use Illuminate\Database\Seeder;

class EstanqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=12;$i++){
            Estanque::create([
                'nombre' => "Estanque $i",
                'tipo' => 1
            ]);
        }
    }
}
