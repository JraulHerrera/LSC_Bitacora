<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class User extends Migration
{
 
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('idUsuario',20); 
            $table->string('tipo',250); 
            $table->rememberToken();
            $table->tinyInteger('activo');
        });
        
      \App\User::create([
         'idUsuario'=>"admin",
         'tipo'=>"admin",
         'activo'=>"1",
        ]);
    }

    public function down()
    {
        Schema::drop('users');
    }
}
