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
        Schema::create('hotel_policies', function (Blueprint $table) {
            $table->id();

            // hotel_id INT NOT NULL UNIQUE, FOREIGN KEY (hotel_id) REFERENCES hotels(id) ON DELETE CASCADE
            $table->foreignId('hotel_id')
                ->unique() // Restricción UNIQUE para la relación Uno a Uno
                ->constrained('hotels')
                ->onDelete('cascade');
            // check_in_time TIME DEFAULT '15:00:00'
            $table->time('check_in_time')->default('15:00:00');
            // check_out_time TIME DEFAULT '11:00:00'
            $table->time('check_out_time')->default('11:00:00');
            // TEXT para políticas largas (nullable por defecto)
            $table->text('cancellation_policy')->nullable();
            $table->text('pet_policy')->nullable();
            $table->text('smoking_policy')->nullable();
            $table->text('children_policy')->nullable();
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
        Schema::dropIfExists('hotel_policies');
    }
};
