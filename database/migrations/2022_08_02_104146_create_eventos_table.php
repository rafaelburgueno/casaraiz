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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();

            $table->string('slug');
            $table->string('nombre');
            $table->string('tipo', 25)->nullable(); // evento, taller, curso, etc.

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->string('responsable', 100)->nullable();
            $table->string('descripcion')->nullable();
            $table->string('lugar', 100)->nullable();

            $table->boolean('activo')->default(true);
            $table->boolean('frecuencia_semanal')->nullable();
            $table->boolean('frecuencia_mensual')->nullable();
            $table->boolean('frecuencia_anual')->nullable();
            //$table->boolean('en_agenda')->default(true);

            $table->date('fecha')->nullable();
            $table->string('hora_de_inicio', 10)->nullable();
            $table->string('hora_de_fin', 10)->nullable();
            $table->string('dia_de_semana', 10)->nullable();
            $table->smallInteger('dia')->nullable();
            $table->string('mes', 10)->nullable();
            $table->smallInteger('anio')->nullable();

            $table->smallInteger('cupos_totales')->nullable();
            $table->smallInteger('cupos_disponibles')->nullable();
            $table->smallInteger('relevancia')->nullable();
            $table->smallInteger('costo_de_inscripcion')->nullable();

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
        Schema::dropIfExists('eventos');
    }
};
