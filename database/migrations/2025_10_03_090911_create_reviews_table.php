<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            // Claves Foráneas
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('hotel_id')->constrained('hotels')->onDelete('cascade');
            // rating DECIMAL(2, 1) NOT NULL
            $table->decimal('rating', 2, 1);
            $table->text('comment')->nullable();
            $table->timestamp('review_date')->useCurrent();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE reviews ADD CONSTRAINT check_review_rating CHECK (rating >= 0 AND rating <= 5)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
