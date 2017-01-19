<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaboratorioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('laboratorio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            $table->string('descripcion',250);
            $table->tinyInteger('estado'); 
            $table->tinyInteger('activo');
            $table->timestamps();
        });

         \App\laboratorio_model::create([
         'nombre'=>"LABORATORIO A",
         'descripcion'=>"LABORATORIO A",
         'estado'=>"0",
         'activo'=>"1",
        ]);
          \App\laboratorio_model::create([
         'nombre'=>"LABORATORIO B",
         'descripcion'=>"LABORATORIO B",
         'estado'=>"0",
         'activo'=>"1",
        ]);
           \App\laboratorio_model::create([
         'nombre'=>"LABORATORIO LINUX C ",
         'descripcion'=>"LABORATORIO C",
         'estado'=>"0",
         'activo'=>"1",
        ]);
             \App\laboratorio_model::create([
         'nombre'=>"LABORATORIO D ",
         'descripcion'=>"LABORATORIO D",
         'estado'=>"0",
         'activo'=>"1",
        ]);

           \App\laboratorio_model::create([
         'nombre'=>"LABORATORIO ROBOTICA ",
         'descripcion'=>"LABORATORIO ROBOTICA",
         'estado'=>"0",
         'activo'=>"1",
        ]);
           \App\laboratorio_model::create([
         'nombre'=>"LABORATORIO SOPORTE",
         'descripcion'=>"LABORATORIO SOPORTE",
         'estado'=>"0",
         'activo'=>"1",
        ]);
    }

  
    public function down()
    {
        Schema::drop('laboratorio');
    }
}
