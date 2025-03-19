<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AutoresTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('autores')->insert([
            ['nombre' => 'Platón', 
            'año' => '2020', 
            'descripcion' => 'Filósofo griego', 
            'created_at' => now(), 
            'updated_at' => now()],

            // INGRESO DEL SEGUNDO AUTOR-EJEMPLO
            ['nombre' => 'Isaac Newton', 
            'año' => '1643', 
            'descripcion' => 'Científico inglés', 
            'created_at' => now(), 
            'updated_at' => now()],
        ]);
    }
}