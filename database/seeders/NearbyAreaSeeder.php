<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NearbyAreaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('nearby_areas')->insert([
            ['nearby_area' => 'Playa'],
            ['nearby_area' => 'Centro comercial'],
            ['nearby_area' => 'Aeropuerto'],
            ['nearby_area' => 'Restaurantes'],
            ['nearby_area' => 'Atracciones turísticas'],
            ['nearby_area' => 'Museos'],
            ['nearby_area' => 'Hospitales'],
            ['nearby_area' => 'Terminal de autobuses'],
            ['nearby_area' => 'Bares'],
            ['nearby_area' => 'Gimnasios'],
            ['nearby_area' => 'Cines'],
            ['nearby_area' => 'Spa'],
        ]);
    }
}