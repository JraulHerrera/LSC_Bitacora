<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class actividad_alumno_model extends Model
{
    public $timestamps = false;
    protected $table='actividad_alumno';
    protected $fillable=['id_laboratorio','id_equipo','matricula','fecha','hora_entrada','hora_salida','actividad','estado','activo'];
    protected $guarded=['id'];
}
