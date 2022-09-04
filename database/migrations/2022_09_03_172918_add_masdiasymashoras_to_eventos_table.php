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
            $table->unsignedBigInteger('referencia_id')->nullable();
            $table->boolean('se_extiende')->nullable()->default(false);
            /*$table->string('hora_de_inicio_2', 10)->nullable();
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
            $table->dropColumn('referencia_id');
            $table->dropColumn('se_extiende');
        });
    }
};
