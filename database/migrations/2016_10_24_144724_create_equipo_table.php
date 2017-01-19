<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_laboratorio')->unsigned();
            $table->foreign('id_laboratorio')->references('id')->on('laboratorio');
            $table->string('n_equipo',50); 
            $table->string('nombre',100); 
            $table->string('descripcion',250);
            $table->string('so',250);
            $table->string('marca',250);
            $table->string('modelo',250);
            $table->string('disco_duro',250);
            $table->string('procesador',250);
            $table->string('monitor',250);
            $table->string('num_inventario',250);
            $table->string('mouse',250); 
            $table->string('teclado',250); 
            $table->string('mother_board',250); 
            $table->string('memoria_ram',250); 
            $table->string('controladores',250); 
            $table->string('fuente',250); 
            $table->string('variedad',250); 
            $table->tinyInteger('estado'); 
            $table->tinyInteger('activo');
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
        Schema::drop('equipo');
    }
}
