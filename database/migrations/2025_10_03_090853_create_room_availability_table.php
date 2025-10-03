<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('room_availability', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_type_id')->constrained('room_types')->onDelete('cascade');
            $table->date('date');
            $table->integer('available_quantity'); 
            $table->decimal('base_price', 10, 2)->nullable();
            $table->unique(['room_type_id', 'date']);
            $table->timestamps();
        });
        
        // CHECK (available_quantity >= 0)
        // Se añade la restricción CHECK usando una sentencia SQL cruda, ya que Laravel 
        // no tiene un helper para esto. Solo funciona en MySQL/PostgreSQL/SQLite.
        DB::statement('ALTER TABLE room_availability ADD CONSTRAINT check_available_quantity CHECK (available_quantity >= 0)');
    }

    public function down(): void
    {
        // Se puede eliminar el CHECK explícitamente si se sabe el nombre, o simplemente 
        // la tabla al completo.
        Schema::dropIfExists('room_availability');
    }
};