<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  public $timestamps = false;
  protected $table='users';
  protected $fillable=['idUsuario','tipo','activo'];
  protected $guarded=['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */    
    
}
