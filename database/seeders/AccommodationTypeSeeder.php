<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccommodationTypeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('accommodation_types')->insert([
            ['accommodation_type' => 'Hotel'],
            ['accommodation_type' => 'Motel'],
            ['accommodation_type' => 'Casa'],
        ]);
    }
}