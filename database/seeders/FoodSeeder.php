<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('foods')->insert([
            ['food' => 'Desayuno'],
            ['food' => 'Almuerzo'],
            ['food' => 'Cena'],
            ['food' => 'Sin comidas'],
        ]);
    }
}