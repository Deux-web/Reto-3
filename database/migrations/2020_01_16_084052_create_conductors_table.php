<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConductorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conductors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('dni')->unique();
            $table->string('nombre');
            $table->string('apellido_p');
            $table->string('apellido_s');
            $table->boolean('titular');
            $table->string('fecha_nac');
            $table->date('fecha_carnet');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('email')->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conductors');
    }
}
