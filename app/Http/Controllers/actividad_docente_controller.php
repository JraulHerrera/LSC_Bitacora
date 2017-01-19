<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class actividad_docente_controller extends Controller
{
     public function stopsessionadmin($id)
    {
    	$hora=date("H");
        $minutos=date("i");
        $segundos=date("s");
		$actividad = \App\actividad_docente_model::find($id);
      	$actividad->estado="0";
      	$actividad->hora_salida=$hora.':'.$minutos.':'.$segundos;
      	$actividad->save();
      	
      	$equipo = \App\laboratorio_model::find($actividad->id_laboratorio);
      	$equipo->estado="0";
      	$equipo->save();

      	return redirect('/laboratorio');
    }
}
