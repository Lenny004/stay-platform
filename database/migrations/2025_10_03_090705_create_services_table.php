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
        Schema::create('services', function (Blueprint $table) {
            $table->id(); // id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY
            // service_name VARCHAR(100) NOT NULL UNIQUE
            $table->string('service_name', 100)->unique();
            // service_image VARCHAR(80) (nullable por defecto en Laravel si no se especifica NOT NULL)
            $table->string('service_image', 80)->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
};
