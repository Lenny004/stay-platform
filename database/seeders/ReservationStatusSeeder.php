<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationStatusSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('reservation_status')->insert([
            ['reservation_status' => 'Pendiente'],
            ['reservation_status' => 'Confirmada'],
            ['reservation_status' => 'Cancelada'],
            ['reservation_status' => 'Finalizada'],
            ['reservation_status' => 'Comentada'],
        ]);
    }
}