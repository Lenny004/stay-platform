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
    public function up() : void
    {
        Schema::create('review_tag', function (Blueprint $table) {
            $table->id();
            // Claves Foráneas con ON DELETE CASCADE
            $table->foreignId('review_id')->constrained('reviews')->onDelete('cascade');
            $table->foreignId('tag_id')->constrained('tags');
            $table->unique(['review_id', 'tag_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('review_tag');
    }
};
