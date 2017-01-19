<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use \App\alumno_model;

class Admin extends Migration
{
    
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('password',20);
            $table->string('nombre',50);
            $table->string('apellidos',250);
            $table->timestamps();
        });

        \App\admin_model::create([
         'password'=>"admin",
         'nombre'=>"admin",
         'apellidos'=>"admin",
        ]);
    }

    public function down()
    {
        Schema::drop('admin');
    }
}
