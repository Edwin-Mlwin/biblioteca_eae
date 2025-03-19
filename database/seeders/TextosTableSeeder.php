<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TextosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('textos')->insert([
            [
                'id_categoria' => 1, // Filosofía
                'titulo' => 'La República',
                'sub_titulo' => 'Diálogos de Platón',
                'id_autor' => 1, // Platón
                'año' => '380 AC',
                'descripcion' => 'Un texto clásico sobre política y justicia.',
                'resumen' => 'Explora la idea de la ciudad ideal y la justicia en la sociedad.',
                'estado' => 1,
                'estado_texto' => 'Publicado',
                'id_archivos' => 1, // Archivo relacionado
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_categoria' => 2, // Ciencia
                'titulo' => 'Principios Matemáticos de la Filosofía Natural',
                'sub_titulo' => 'Obra de Isaac Newton',
                'id_autor' => 2, // Isaac Newton
                'año' => '1687',
                'descripcion' => 'Un libro fundamental sobre las leyes del movimiento y la gravedad.',
                'resumen' => 'Desarrolla la mecánica clásica y la ley de la gravitación universal.',
                'estado' => 1,
                'estado_texto' => 'Publicado',
                'id_archivos' => 2, // Archivo relacionado
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
