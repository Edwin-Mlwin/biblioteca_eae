<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UsersTablesSeeder::class,
            CategoriasTableSeeder::class,
            AutoresTableSeeder::class,
            ArchivosTableSeeder::class,
            TextosTableSeeder::class,
        ]);
    }
}