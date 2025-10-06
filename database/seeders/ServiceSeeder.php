<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('services')->insert([
            ['service_name' => 'Wifi', 'service_image' => 'wifi.png'],
            ['service_name' => 'Cocina', 'service_image' => 'cocina.png'],
            ['service_name' => 'Televisión', 'service_image' => 'TV.png'],
            ['service_name' => 'Aire acondicionado', 'service_image' => 'aire.png'],
            ['service_name' => 'Área de trabajo', 'service_image' => 'area_de_trabajo.png'],
            ['service_name' => 'Lavandería', 'service_image' => 'lavanderia.png'],
            ['service_name' => 'Estacionamiento', 'service_image' => 'parqueo.png'],
            ['service_name' => 'Bar', 'service_image' => 'bar.png'],
            ['service_name' => 'Caja fuerte', 'service_image' => 'caja_fuerte.png'],
        ]);
    }
}