<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activitis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label');
            $table->string('description');
            $table->string('active');
            $table->string('campo1');
            $table->string('campo2');
            $table->string('campo3');
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
        Schema::drop('activitis');
    }
}
