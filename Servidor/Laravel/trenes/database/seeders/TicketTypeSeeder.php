<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('ticket_types')->insert([
            [
                'type' => 'Billete sencillo'
            ],
            [
                'type' => 'Abono mensual'
            ],
            [
                'type' => 'Abono trimestral'
            ]
        ]);
    }
}
