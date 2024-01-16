<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('artistas')->insert([
            [
                'nombre_artista' => 'Jarfaiter',
                'genero_artista' => 'Rap'
            ],
            [
                'nombre_artista' => 'Mozart',
                'genero_artista' => 'Clasica'
            ]
        ]);
    }
}
