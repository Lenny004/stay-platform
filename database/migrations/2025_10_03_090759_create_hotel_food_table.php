<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_food', function (Blueprint $table) {
            $table->id();
            // hotel_id y food_id (claves foráneas)
            $table->foreignId('hotel_id')->constrained('hotels')->onDelete('cascade');
            $table->foreignId('food_id')->constrained('foods');
            // UNIQUE (hotel_id, food_id) para evitar duplicados
            $table->unique(['hotel_id', 'food_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_food');
    }
};
