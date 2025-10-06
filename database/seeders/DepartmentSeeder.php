<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('departments')->insert([
            ['department' => 'Ahuachapán'],
            ['department' => 'Santa Ana'],
            ['department' => 'Sonsonate'],
            ['department' => 'Chalatenango'],
            ['department' => 'La Libertad'],
            ['department' => 'San Salvador'],
            ['department' => 'Cuscatlán'],
            ['department' => 'La Paz'],
            ['department' => 'Cabañas'],
            ['department' => 'San Vicente'],
            ['department' => 'Usulután'],
            ['department' => 'San Miguel'],
            ['department' => 'Morazán'],
            ['department' => 'La Unión'],
        ]);
    }
}