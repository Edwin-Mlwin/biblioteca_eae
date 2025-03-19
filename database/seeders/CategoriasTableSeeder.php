<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categorias')->insert([
            ['nombre' => 'Derecho', 
            'descripcion' => 'leyes generales del estado', 
            'estado' => 1, 
            'created_at' => now(), 
            'updated_at' => now()],


            ['nombre' => 'Leyes Penales', 
            'descripcion' => 'Documento PDF', 
            'estado' => 1, 
            'created_at' => now(), 
            'updated_at' => now()],
        ]);
    }
}