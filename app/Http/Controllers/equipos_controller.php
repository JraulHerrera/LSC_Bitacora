<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class equipos_controller extends Controller
{
  public function index()
  {
    return view('equipos.equipoform');
  }

  public function stopsession(Request $request)
  {
    $hora=date("H");
    $minutos=date("i");
    $segundos=date("s");

    $session = DB::table('actividad_alumno')
      ->select('actividad_alumno.*')
      ->where('actividad_alumno.estado','=', 1)
      ->where('actividad_alumno.matricula','=', Auth::user()->idUsuario)
      ->first();

      $id=$session->id_equipo;
      $actividad = \App\actividad_alumno_model::find($session->id);
        $actividad->estado="0";
        $actividad->hora_salida=$hora.':'.$minutos.':'.$segundos;
        $actividad->save();

      $equipo = \App\equipo_model::find($id);
       $equipo->estado="0";
       $equipo->save();
       Session::flash('message','Se a terminada sesión ');
    return redirect('bitacora');
  }

  public function signlapb(Request $request)
  {
    $hora=date("H");
    $minutos=date("i");
    $segundos=date("s");
    $fecha = date('Y-m-d');
    
    \App\actividad_alumno_model::create(
      [
        'id_laboratorio'=>$request['idlab'],
        'id_equipo'=>$request['id_equipo'],
        'matricula'=>$request['idalum'],
        'fecha'=>$fecha,
        'hora_entrada'=>$hora.':'.$minutos.':'.$segundos,
        'actividad'=>$request['actividad'],
        'estado'=>'1',
        'activo'=>'1',
      ]
    );

    $equipo = \App\equipo_model::find($request['id_equipo']);
      $equipo->estado=1;
      $equipo->save();
      Session::flash('message','Se a Asignado Correctamente No olvides cerrar tu session!!!');
    return redirect('bitacora');
  }

  public function equiposlab($id)
  {
      $idlab=$id;
      $equipos = DB::table('equipo')
          ->join('laboratorio', 'laboratorio.id', '=', 'equipo.id_laboratorio')
          ->select('equipo.*', 'laboratorio.nombre as name')
           ->where('equipo.activo','=', 1)
           ->where('laboratorio.activo','=', 1)
           ->where('equipo.id_laboratorio','=', $idlab)
          ->get();

      $session = DB::table('actividad_alumno')
        ->join('equipo', 'equipo.id','=','actividad_alumno.id_equipo')
        ->join('laboratorio', 'laboratorio.id','=','actividad_alumno.id_laboratorio')
          ->select('actividad_alumno.*','equipo.nombre as name', 'laboratorio.nombre as labname')
           ->where('actividad_alumno.estado','=', 1)
           ->where('actividad_alumno.matricula','=', Auth::user()->idUsuario)
          ->first();
    return view('alumno.equiposlab', compact('equipos', 'idlab', 'session'));
  }

  public function lstequipo()
  {
    	$equipos = DB::table('equipo')
          ->join('laboratorio', 'laboratorio.id', '=', 'equipo.id_laboratorio')
          ->select('equipo.*', 'laboratorio.nombre as name')
          ->where('equipo.activo','=', 1)
          ->paginate(20);
    return View('equipos.equiposhow',compact('equipos'));
  }

  public function getequipo(Request $request)
  {
      $id_laboratorio= $request['id_laboratorio'];
      $equipos = DB::table('equipo')
          ->join('laboratorio', 'laboratorio.id', '=', 'equipo.id_laboratorio')
          ->select('equipo.*', 'laboratorio.nombre as name')
           ->where('equipo.activo','=', 1)
           ->where('equipo.id_laboratorio','=', $request['id_laboratorio'])
          ->paginate(200);
    return View('equipos.equiposhow',compact('equipos','id_laboratorio'));
  }
    
  public function edit($id)
  { 
      $laboratorios = DB::table('laboratorio')
          ->select('laboratorio.*')    
          ->whereactivo('1')->get();
      $equipos = \App\equipo_model::find($id);
  return View('equipos.equipoform',compact('equipos', 'laboratorios')); 
  }

  public function delete($id)
  { 
      $equipos = \App\equipo_model::find($id);
      $equipos->activo=0;
      $equipos->save();
      Session::flash('message','Sección Eliminada Correctamente');    
    return redirect('/equipo');
  }

  public function store(Request $request)
  {
      $id = $request['id'];
      $nombre = $request['nombre'];
      $descripcion = $request['descripcion'];

      if($id=="0")
      {
        \App\equipo_model::create([
           'nombre'=>$nombre,
           'descripcion'=>$descripcion,
           'activo'=>'1',
           'id_laboratorio'=>$request['id_laboratorio'],
           'n_equipo'=>$request['n_equipo'],
           'so'=>$request['so'],
           'marca'=>$request['marca'],
           'modelo'=>$request['modelo'],
           'disco_duro'=>$request['disco_duro'],
           'procesador'=>$request['procesador'],
           'monitor'=>$request['monitor'],
           'num_inventario'=>$request['num_inventario'],
           'mouse'=>$request['mouse'],
           'mother_board'=>$request['mother_board'],
           'teclado'=>$request['teclado'],
           'memoria_ram'=>$request['memoria_ram'],
          ]);
      }
      else
      {
          $equipo = \App\equipo_model::find($id);
          $equipo->nombre=$nombre;
          $equipo->descripcion=$descripcion;
          $equipo->id_laboratorio=$request['id_laboratorio'];
          $equipo->n_equipo=$request['n_equipo'];
          $equipo->so=$request['so'];
          $equipo->marca=$request['marca'];
          $equipo->modelo=$request['modelo'];
          $equipo->disco_duro=$request['disco_duro'];
          $equipo->procesador=$request['procesador'];
          $equipo->monitor=$request['monitor'];
          $equipo->num_inventario=$request['num_inventario'];
          $equipo->mouse=$request['mouse'];
          $equipo->mother_board=$request['mother_board'];
          $equipo->teclado=$request['teclado'];
          $equipo->memoria_ram=$request['memoria_ram'];
          $equipo->activo='1';
          $equipo->save();
          Session::flash('message','Equipo Actualizado Correctamente');  
        return redirect('/equipo');
      }

    Session::flash('message','Equipo Creado Correctamente');     
    return redirect('/equipo');
  }

  public function equiposdetail($id, Request $request)
  {
    if($request->ajax())
    {
      $equipos = DB::table('actividad_alumno')
        ->select('actividad_alumno.*')    
        ->whereestado('1')
        ->whereid_equipo($id)
        ->first();
      $alumno= DB::table('alumno')
        ->select('alumno.*')
        ->wherematricula($equipos->matricula)
        ->whereactivo('1')
        ->first();
      return response()->json(
            [
              "alumno" => $alumno,
              "equipos"=>$equipos
            ]
        );
     }  
  }
}
