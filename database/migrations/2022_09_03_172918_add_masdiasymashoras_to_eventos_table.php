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
        Schema::table('eventos', function (Blueprint $table) {
            $table->unsignedBigInteger('es_extencion_del_evento_id')->nullable(); // lo uso para encontrar el evento padre
            $table->boolean('tiene_extenciones')->nullable()->default(false); //este valor lo uso para saber si tengo que traer datos adicionales

            /*$table->unsignedBigInteger('apunta_a_id')->nullable();
            $table->boolean('es_referencia')->nullable()->default(true); 
            $table->string('hora_de_inicio_2', 10)->nullable();
            $table->string('hora_de_fin_2', 10)->nullable();
            $table->string('dia_de_semana_2', 10)->nullable();

            $table->string('hora_de_inicio_3', 10)->nullable();
            $table->string('hora_de_fin_3', 10)->nullable();
            $table->string('dia_de_semana_3', 10)->nullable();*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eventos', function (Blueprint $table) {
            $table->dropColumn('es_extencion_del_evento_id');
            $table->dropColumn('tiene_extenciones');
        });
    }
};
