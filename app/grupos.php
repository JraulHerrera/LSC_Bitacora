<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class grupos extends Model
{
	public $timestamps = false;
    protected $table='grupos';
   protected $fillable=['grupo','clave'];
   protected $guarded=['id'];
}
