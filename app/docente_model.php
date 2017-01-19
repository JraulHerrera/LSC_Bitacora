<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class docente_model extends Model
{
    //public $timestamps = false;
    protected $table='docente';
    protected $fillable=['n_plaza','nombre','apellidos','activo'];
    protected $guarded=['id'];
}
