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
        Schema::create('users', function (Blueprint $table) {
            // id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY
            $table->id();

            // Claves Foráneas: En Laravel, 'foreignId' es el atajo recomendado
            // para columnas BIGINT UNSIGNED que referencian a 'id()' en otra tabla.
            $table->foreignId('nationality_id')->nullable()->constrained('nationalities');
            $table->foreignId('user_type_id')->constrained('user_types');
            $table->foreignId('currency_id')->nullable()->constrained('currencies');
            $table->foreignId('us_state_id')->nullable()->constrained('us_states');
            $table->string('full_name', 70);
            $table->string('username', 70)->unique();
            $table->string('email', 90);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profile_image', 80)->nullable();
            $table->string('phone_country_code', 10)->default('+503');
            $table->string('local_phone', 20)->nullable();
            // registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            // Laravel usa created_at y updated_at, por lo que crearemos un campo
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
        Schema::dropIfExists('users');
    }
};
