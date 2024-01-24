<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('films')->insert([
            [
                'title' => 'El caballero oscuro',
                'duration' => 160,
                'age_rating' => 12
            ],
            [
                'title' => 'Los Rugrats',
                'duration' => 100,
                'age_rating' => 3
            ]
        ]);
    }
}
