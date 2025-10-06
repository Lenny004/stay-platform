<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tags')->insert([
            ['tag_name' => 'Pet Friendly'],
            ['tag_name' => 'Vista al Mar'],
            ['tag_name' => 'Cerca del Aeropuerto'],
            ['tag_name' => 'Centro Histórico'],
            ['tag_name' => 'Desayuno Gratis'],
            ['tag_name' => 'Todo Incluido'],
            ['tag_name' => 'Ideal para Familias'],
            ['tag_name' => 'Solo Adultos'],
            ['tag_name' => 'Eco Friendly'],
            ['tag_name' => 'Accesible para Sillas de Ruedas'],
            // Tags para reviews
            ['tag_name' => 'Limpieza'],
            ['tag_name' => 'Veracidad'],
            ['tag_name' => 'Llegada'],
            ['tag_name' => 'Comunicación'],
            ['tag_name' => 'Ubicación'],
            ['tag_name' => 'Otros'],
        ]);
    }
}