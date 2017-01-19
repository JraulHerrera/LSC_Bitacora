<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadDocentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad_docente', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_laboratorio')->unsigned();
            $table->foreign('id_laboratorio')->references('id')->on('laboratorio');
            $table->string('n_plaza',10);
            $table->date('fecha'); 
            $table->string('hora_entrada',100); 
            $table->string('hora_salida',100)->nullable();
            $table->string('semestre',250); 
            $table->string('grupo',10); 
            $table->string('n_alumnos',250); 
            $table->string('actividad',250); 
            $table->string('carrera',250); 
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
        Schema::drop('actividad_docente');
    }
}
