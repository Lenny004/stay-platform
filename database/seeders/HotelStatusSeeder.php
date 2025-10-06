<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelStatusSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('hotel_status')->insert([
            ['status' => 'Activo'],
            ['status' => 'Inactivo'],
        ]);
    }
}