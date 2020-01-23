<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('tipo');
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->string('direccion');
            $table->string('estado')->default('ACTIVA');;
            $table->string('tipo_resolucion')->nullable();
            $table->text('mensaje_resolucion')->nullable();
            $table->boolean('taxi');
            $table->string('estado_conductor');
            $table->string('operador');
            $table->date('fecha_resolucion')->nullable();
            $table->unsignedBigInteger('conductor_id');
            $table->unsignedBigInteger('coche_id');
            $table->unsignedBigInteger('centro_id');
            $table->unsignedBigInteger('tecnico_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidencias');
    }
}
