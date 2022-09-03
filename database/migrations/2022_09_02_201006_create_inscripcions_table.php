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
        Schema::create('inscripcions', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->string('nombre', 100)->nullable();
            $table->string('correo', 100)->nullable();
            $table->string('documento_de_identidad', 20)->nullable();
            $table->string('telefono', 20)->nullable();

            $table->unsignedBigInteger('inscripcionable_id')->nullable();
            $table->string('inscripcionable_type')->nullable();

            $table->string('medio_de_pago', 20)->nullable();
            $table->string('intereses')->nullable();
            $table->string('comentario')->nullable();
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
        Schema::dropIfExists('inscripcions');
    }
};
