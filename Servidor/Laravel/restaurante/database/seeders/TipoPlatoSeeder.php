<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoPlatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('tipo_platos')->insert([
            [
                'tipo' => 'Racion'
            ],
            [
                'tipo' => 'Media Ración'
            ],
            [
                'tipo' => 'Tapa'
            ]
        ]);
    }
}
