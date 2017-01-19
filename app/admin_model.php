<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin_model extends Model
{
    // $timestamps = false;
    protected $table='admin';
    protected $fillable=['password','nombre','apellidos'];
    protected $guarded=['id'];
}
