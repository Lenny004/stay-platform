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
        Schema::create('activities', function (Blueprint $table) {
            $table->id(); // id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY
            // activity_name VARCHAR(100) NOT NULL UNIQUE
            $table->string('activity_name', 100)->unique();
            // activity_image VARCHAR(80) (nullable)
            $table->string('activity_image', 80)->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
};
