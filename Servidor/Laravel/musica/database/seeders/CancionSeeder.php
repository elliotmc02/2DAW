<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CancionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('canciones')->insert([
            [
                'titulo_cancion' => 'Politica de Parque',
                'genero_cancion' => 'Rap',
                'duracion' => '00:03:05',
                'artista_id' => 1
            ],
            [
                'titulo_cancion' => 'Lacrimosa',
                'genero_cancion' => 'Clasica',
                'duracion' => '00:03:25',
                'artista_id' => 2
            ]
        ]);
    }
}
