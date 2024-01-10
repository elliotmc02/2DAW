<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BebidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('bebidas')->insert([
            [
                'nombre' => 'Monster',
                'precio' => 2,
                'tipo' => 'Energetica'
            ],
            [
                'nombre' => 'Coca-Cola',
                'precio' => 1,
                'tipo' => 'Refresco'
            ],
            [
                'nombre' => 'Cerveza',
                'precio' => 1.5,
                'tipo' => 'Alcohol'
            ]
        ]);
    }
}
