<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use DB;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gate;

class laboratorio_controller extends Controller
{
   
    public function index()
    {
        return view('laboratorios.laboratorioform');
    }

    public function stopsessiondocente(Request $request)
    {
      $hora=date("H");
      $minutos=date("i");
      $segundos=date("s");

      $actividad = \App\actividad_docente_model::find($request['id']);
      $actividad->estado="0";
      $actividad->hora_salida=$hora.':'.$minutos.':'.$segundos;
      $actividad->save();

      $laboratorio = \App\laboratorio_model::find($request['idlab']);
      $laboratorio->estado="0";
      $laboratorio->save();
      Session::flash('message','Se a completado su sesión ');
      return redirect('bitacora');
    }

    public function signlaboratorio(Request $request)
    {
    
        if($request ['id_labo']== '')
        {
          Session::flash('messageError','No selecciono laboratorio');
          return redirect('laboratoriodocente');
        }
      $hora=date("H");
      $minutos=date("i");
      $segundos=date("s");
      $fecha = date('Y-m-d');

      \App\actividad_docente_model::create(
        [
         'id_laboratorio'=>$request['id_labo'],
         'n_plaza'=>$request['iddocente'],
         'fecha'=>$fecha,
         'hora_entrada'=>$hora.':'.$minutos.':'.$segundos,
         'semestre'=>$request['semestre'],
         'grupo'=>$request['grupo'],
         'n_alumnos'=>$request['n_alumnos'],
         'actividad'=>$request['actividad'],
         'carrera'=>$request['carrera'],
         'estado'=>'1',
         'activo'=>'1',
        ]
      );

      $equipo = \App\laboratorio_model::find($request['id_labo']);
        $equipo->estado=1;
        $equipo->save();
        Session::flash('message','Se a Asignado Correctamente');
      return redirect('bitacora');
    }

    public function lstlab()
    {
      $laboratorios = DB::table('laboratorio')
        ->select('laboratorio.*')    
        ->whereactivo('1')->get();
      return View('laboratorios.listaLaboratorio',compact('laboratorios')); 
    }

    public function edit($id)
    { 
      $laboratorios = \App\laboratorio_model::find($id);
      return View('laboratorios.laboratorioform',compact('laboratorios')); 
    }

    public function delete($id)
    { 
       try
        {
          \App\laboratorio_model::destroy($id);
          Session::flash('message','laboratorio Eliminado Correctamente');
          return redirect('/laboratorio');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
          Session::flash('message-error','No se a Podido Eliminar el laboratorio');    
          return redirect('/laboratorio');
        }
    }

    public function store(Request $request)
    {
      $id = $request['id'];
      $nombre = $request['nombre'];
      $descripcion = $request['descripcion'];
      if($id=="0"){
        \App\laboratorio_model::create([
         'nombre'=>$nombre,
         'descripcion'=>$descripcion,
         'activo'=>'1',
        ]);
      }else{
          $laboratorio = \App\laboratorio_model::find($id);
          $laboratorio->nombre=$nombre;
          $laboratorio->descripcion=$descripcion;
          $laboratorio->activo='1';
          $laboratorio->save();

          $laboratorios = DB::table('laboratorio')
          ->select('laboratorio.*')    
          ->whereactivo('1')->get();
          Session::flash('message','Laboratorio Actualizado Correctamente');
          return redirect('/laboratorio');
      }
        Session::flash('message','Laboratorio Creado Correctamente');     
        return redirect('/laboratorio');
    }

    public function detailLabs($id, Request $request)
    {
      if($request->ajax()){
        $laboratorios = DB::table('actividad_docente')
          ->select('actividad_docente.*')    
          ->whereestado('1')
          ->whereid_laboratorio($id)
          ->first();
        
        $docente= DB::table('docente')
          ->select('docente.*')
          ->wheren_plaza($laboratorios->n_plaza)
          ->whereactivo('1')
          ->first();

        return response()->json(
          [
            "docentes" => $docente,
            "laboratorio"=>$laboratorios
          ]
        );
      }  
    }    
}
