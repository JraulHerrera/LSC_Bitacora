<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class laboratorio_model extends Model
{
    //public $timestamps = false;
    protected $table='laboratorio';
    protected $fillable=['nombre','descripcion','estado','activo'];
    protected $guarded=['id'];
}
