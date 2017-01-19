<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadAlumnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad_alumno', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_laboratorio')->unsigned();
            $table->foreign('id_laboratorio')->references('id')->on('laboratorio');
            $table->integer('id_equipo')->unsigned();
            $table->foreign('id_equipo')->references('id')->on('equipo');
            $table->string('matricula',10);
            $table->date('fecha'); 
            $table->string('hora_entrada',100); 
            $table->string('hora_salida',100)->nullable();
            $table->string('actividad',250); 
            $table->string('estado',50); 
            $table->tinyInteger('activo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('actividad_alumno');
    }
}
