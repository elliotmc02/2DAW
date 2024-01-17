<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('trains')->insert([
            [
                'name' => 'Tren 1',
                'passengers' => 150,
                'year' => 2015,
                'train_type_id' => 3
            ],
            [
                'name' => 'Tren 2',
                'passengers' => 25,
                'year' => 2002,
                'train_type_id' => 1
            ],
            [
                'name' => 'Tren 3',
                'passengers' => 65,
                'year' => 2020,
                'train_type_id' => 2
            ]
        ]);
    }
}
