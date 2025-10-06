<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('currencies')->insert([
            ['currency' => 'USD', 'symbol' => ''],
            ['currency' => 'EUR', 'symbol' => '€'],
            ['currency' => 'GBP', 'symbol' => '£'],
            ['currency' => 'JPY', 'symbol' => '¥'],
            ['currency' => 'CAD', 'symbol' => ''],
            ['currency' => 'AUD', 'symbol' => ''],
            ['currency' => 'CHF', 'symbol' => 'CHF'],
            ['currency' => 'MXN', 'symbol' => ''],
            ['currency' => 'BRL', 'symbol' => 'R'],
            ['currency' => 'ARS', 'symbol' => ''],
            ['currency' => 'CLP', 'symbol' => ''],
            ['currency' => 'COP', 'symbol' => ''],
            ['currency' => 'PEN', 'symbol' => 'S/'],
            ['currency' => 'CNY', 'symbol' => '¥'],
            ['currency' => 'INR', 'symbol' => '₹'],
            ['currency' => 'KRW', 'symbol' => '₩'],
            ['currency' => 'ZAR', 'symbol' => 'R'],
            ['currency' => 'SEK', 'symbol' => 'kr'],
            ['currency' => 'NOK', 'symbol' => 'kr'],
            ['currency' => 'DKK', 'symbol' => 'kr'],
        ]);
    }
}