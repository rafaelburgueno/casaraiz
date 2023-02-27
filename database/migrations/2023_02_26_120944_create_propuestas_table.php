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
        Schema::create('propuestas', function (Blueprint $table) {
            $table->id();

            $table->string('nombre', 100);
            $table->string('nombre_del_emprendimiento', 100)->nullable();
            $table->string('correo', 100);
            $table->string('telefono', 20)->nullable();
            $table->string('redes_sociales', 100)->nullable();

            $table->string('descripcion', 1000);

            $table->boolean('recibir_novedades')->default(false);

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
        Schema::dropIfExists('propuestas');
    }
};
