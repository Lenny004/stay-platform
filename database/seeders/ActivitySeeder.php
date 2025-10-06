<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('activities')->insert([
            ['activity_name' => 'Disco', 'activity_image' => 'disco.png'],
            ['activity_name' => 'Yoga', 'activity_image' => 'yoga.png'],
            ['activity_name' => 'Spa', 'activity_image' => 'spa.png'],
            ['activity_name' => 'Shows', 'activity_image' => 'Show.png'],
            ['activity_name' => 'Senderismo', 'activity_image' => 'senderismo.png'],
            ['activity_name' => 'Futbol', 'activity_image' => 'futbol.png'],
            ['activity_name' => 'Bicicletas', 'activity_image' => 'bicicleta.png'],
            ['activity_name' => 'Motos', 'activity_image' => 'moto.png'],
            ['activity_name' => 'Golf', 'activity_image' => 'golf.png'],
            ['activity_name' => 'Gym', 'activity_image' => 'gyn.png'],
            ['activity_name' => 'Lanchas', 'activity_image' => 'lancha.png'],
            ['activity_name' => 'Surf', 'activity_image' => 'surf.png'],
            ['activity_name' => 'Canopy', 'activity_image' => 'canopy.png'],
            ['activity_name' => 'Tours', 'activity_image' => 'tour.png'],
            ['activity_name' => 'Playa', 'activity_image' => 'playa.png'],
            ['activity_name' => 'Jetsky', 'activity_image' => 'jetsky.png'],
            ['activity_name' => 'Kayak', 'activity_image' => 'kayak.png'],
        ]);
    }
}