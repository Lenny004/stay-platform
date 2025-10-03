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
        Schema::create('nearby_areas', function (Blueprint $table) {
            $table->id(); // id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY
            $table->string('nearby_area', 100); // nearby_area VARCHAR(100) NOT NULL
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nearby_areas');
    }
};
