<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('tickets')->insert([
            [
                'date' => '2024-01-17 10:30:34',
                'price' => 6.75,
                'train_id' => 1,
                'ticket_type_id' => 1
            ],
            [
                'date' => '2024-01-17 10:36:58',
                'price' => 20.23,
                'train_id' => 2,
                'ticket_type_id' => 2
            ],
            [
                'date' => '2024-01-17 10:23:12',
                'price' => 13.35,
                'train_id' => 3,
                'ticket_type_id' => 3
            ]
        ]);
    }
}
