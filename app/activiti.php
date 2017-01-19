<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class activiti extends Model
{
       protected $table='activitis';
    protected $fillable=['label','description','active','campo1'];
    protected $guarded=['id'];
}
