<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('payment_methods')->insert([
            ['payment_method' => 'Tarjeta de crédito'],
            ['payment_method' => 'Tarjeta de débito'],
            ['payment_method' => 'Efectivo'],
        ]);
    }
}