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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id(); // PRIMARY KEY

            // Claves Foráneas (Foreign Keys)
            $table->foreignId('status_id')->constrained('hotel_status');
            $table->foreignId('department_id')->constrained('departments');
            $table->foreignId('accommodation_type_id')->constrained('accommodation_types');
            $table->foreignId('user_id')->constrained('users');

            // Columnas de Datos
            $table->string('hotel_name', 100);
            $table->string('description', 200)->nullable();
            $table->string('city', 75)->nullable();
            $table->string('address', 100)->nullable();
            
            // DECIMAL(2, 1) - Ej: 4.5 estrellas
            $table->decimal('stars', 2, 1)->nullable(); 
            
            $table->date('foundation_date')->nullable();
            $table->integer('total_rooms');
            $table->string('contact_email', 90)->nullable();
            $table->string('contact_phone', 30)->nullable();
            
            // DECIMAL(10, 8) y DECIMAL(11, 8) para coordenadas
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();

            $table->timestamps(); // created_at y updated_at (Opcional, pero recomendado)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
};
