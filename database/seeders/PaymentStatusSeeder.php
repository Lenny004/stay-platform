<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentStatusSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('payment_status')->insert([
            ['payment_status' => 'Pendiente'],
            ['payment_status' => 'Aprobado'],
            ['payment_status' => 'Reembolsado'],
        ]);
    }
}