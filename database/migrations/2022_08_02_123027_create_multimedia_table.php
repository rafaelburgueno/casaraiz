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
        Schema::create('multimedia', function (Blueprint $table) {
            $table->id();

            $table->smallInteger('relevancia')->nullable();
            $table->string('tipo', 25)->nullable(); // video, imagen, audio, etc.
            $table->string('url')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('resolucion', 20)->nullable();
            $table->string('tamaño', 20)->nullable();
            
            $table->unsignedBigInteger('multimediaable_id')->nullable();
            $table->string('multimediaable_type')->nullable();

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
        Schema::dropIfExists('multimedia');
    }
};
