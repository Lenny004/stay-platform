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
        Schema::create('hotel_images', function (Blueprint $table) {
            $table->id();
            // hotel_id INT NOT NULL, FOREIGN KEY (hotel_id) REFERENCES hotels(id) ON DELETE CASCADE
            $table->foreignId('hotel_id')->constrained('hotels')->onDelete('cascade');
            $table->string('image_path', 80);
            $table->integer('image_order');
            $table->boolean('is_main')->default(false); // BOOLEAN DEFAULT FALSE
            // Opcional: Asegurar que la imagen principal sea única por hotel (si solo hay una principal)
            // $table->unique(['hotel_id', 'is_main']); 
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
        Schema::dropIfExists('hotel_images');
    }
};
