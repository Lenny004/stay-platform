<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('user_types')->insert([
            ['user_type' => 'Administrador'],
            ['user_type' => 'Hotelero'],
            ['user_type' => 'Cliente'],
        ]);
    }
}