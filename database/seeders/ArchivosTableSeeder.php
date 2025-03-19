<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArchivosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('archivos')->insert([
            [ 
                'directorio' => 'archivos/archivo1.pdf',
                'descripcion' => 'libro de la metodologia griega',
                'estado' => 1,
                'is_visible' => 'SI',  // la parte de SI O NO
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [ 
                'directorio' => 'archivos/archivo1.pdf',
                'descripcion' => 'libro de la metodologia QATAR',
                'estado' => 1,
                'is_visible' => 'SI',  // la parte de SI o NO
                'created_at' => now(), 
                'updated_at' => now()
            ],
        ]);
    }
}
