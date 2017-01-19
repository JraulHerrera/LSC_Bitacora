<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class actividad_docente_model extends Model
{
    public $timestamps = false;
    protected $table='actividad_docente';
    protected $fillable=['id_laboratorio','n_plaza','fecha','hora_entrada','hora_salida','semestre','n_alumnos','actividad','carrera','grupo','estado','activo'];
    protected $guarded=['id'];
}
