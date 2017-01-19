<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alumno_model extends Model
{
    //public $timestamps = false;
    protected $table='alumno';
    protected $fillable=['matricula','nombre','apellidos','carrera','semestre','grupo','activo'];
    protected $guarded=['id'];
}
