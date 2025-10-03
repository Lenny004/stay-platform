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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id(); // PRIMARY KEY
            // Claves Foráneas
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('room_type_id')->constrained('room_types'); 
            $table->foreignId('reservation_status_id')->constrained('reservation_status');
            $table->foreignId('payment_status_id')->nullable()->constrained('payment_status'); 
            $table->date('check_in');
            $table->date('check_out');
            $table->integer('guests_count');
            // total_amount DECIMAL(10, 2) NOT NULL
            $table->decimal('total_amount', 10, 2);
            $table->text('special_requests')->nullable(); 
            // reservation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            $table->timestamp('reservation_date')->useCurrent();
            // Incluimos created_at y updated_at, aunque reservation_date ya existe.
            // Si la aplicación requiere 'created_at' para otros fines, $table->timestamps() es útil.
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
        Schema::dropIfExists('reservations');
    }
};
