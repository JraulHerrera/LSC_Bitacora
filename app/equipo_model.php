<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class equipo_model extends Model
{
    //public $timestamps = false;
    protected $table='equipo';
    protected $fillable=['id_laboratorio','n_equipo','nombre','descripcion','so','marca','modelo','disco_duro','procesador','monitor','num_inventario','mouse','teclado','mother_board','memoria_ram','controladores','fuente','variedad','estado','activo'];
    protected $guarded=['id'];
}
