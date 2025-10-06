<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // Tablas padre (sin dependencias)
            UserTypeSeeder::class,
            CurrencySeeder::class,
            NationalitySeeder::class,
            UsStateSeeder::class,
            HotelStatusSeeder::class,
            DepartmentSeeder::class,
            FoodSeeder::class,
            PaymentMethodSeeder::class,
            AccommodationTypeSeeder::class,
            NearbyAreaSeeder::class,
            ServiceSeeder::class,
            ActivitySeeder::class,
            TagSeeder::class,
            ReservationStatusSeeder::class,
            PaymentStatusSeeder::class,
            
            // Tablas con dependencias (descomentar cuando las necesites)
            // UserSeeder::class,
            // HotelSeeder::class,
            // RoomTypeSeeder::class,
            // etc...
        ]);
    }
}
