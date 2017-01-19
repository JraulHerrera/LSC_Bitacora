<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\admin_model;
use DB;
use View;
use Auth;
use Session;

class admin_controller extends Controller
{

  public function perfiladmin(){
    $user = DB::table('admin')
      ->select('admin.*')    
      ->wherepassword(Auth::user()->idUsuario)
      ->first();
    return View::make('admin.perfiladmin',compact('user'));  
  }

  public function historialcompleto(){
    $fecha=date("Y-m-d");
    

    $historial = DB::table('actividad_alumno')
        ->join('alumno', 'alumno.matricula', '=', 'actividad_alumno.matricula')
        ->join('equipo', 'equipo.id', '=', 'actividad_alumno.id_equipo')
        ->join('laboratorio', 'laboratorio.id', '=', 'actividad_alumno.id_laboratorio')
        ->select('actividad_alumno.*', 'alumno.nombre as nombre', 'alumno.apellidos as apellidos', 'equipo.nombre as equiponame', 'laboratorio.nombre as nombrelab')
        ->where('actividad_alumno.activo','=',1)
        ->where('fecha','=',$fecha)
        ->orderBy('fecha','DESC')
        ->paginate(20);

        return View::make('admin.historialcompleto',compact('historial')); 
  }

  public function historialcompletodocente(){
    $fecha=date("Y-m-d");
    $historial = DB::table('actividad_docente')
        ->join('docente', 'docente.n_plaza', '=', 'actividad_docente.n_plaza')
        ->join('laboratorio', 'laboratorio.id', '=', 'actividad_docente.id_laboratorio')
        ->select('actividad_docente.*', 'docente.nombre as nombre', 'docente.apellidos as apellidos', 'laboratorio.nombre as nombrelab')
        ->where('actividad_docente.activo','=',1)
        ->where('fecha','=',$fecha)
        ->orderBy('fecha','DESC')
        ->paginate(20);

        return View::make('admin.historialdocenteadmin',compact('historial')); 
  }

  public function searchhistorialdocente(Request $request)
  {
    $historial = DB::table('actividad_docente')
        ->join('docente', 'docente.n_plaza', '=', 'actividad_docente.n_plaza')
        ->join('laboratorio', 'laboratorio.id', '=', 'actividad_docente.id_laboratorio')
        ->select('actividad_docente.*', 'docente.nombre as nombre', 'docente.apellidos as apellidos', 'laboratorio.nombre as nombrelab')
        ->where('actividad_docente.activo','=',1)
        ->where('fecha','>=',$request->inicio)
        ->where('fecha','<=',$request->fin)
        ->orderBy('fecha','DESC')
        ->paginate(20);


        return View::make('admin.historialdocenteadmin',compact('historial'));
  }

  public function searchhistorial(Request $request)
  {
    $historial = DB::table('actividad_alumno')
        ->join('alumno', 'alumno.matricula', '=', 'actividad_alumno.matricula')
        ->join('equipo', 'equipo.id', '=', 'actividad_alumno.id_equipo')
        ->join('laboratorio', 'laboratorio.id', '=', 'actividad_alumno.id_laboratorio')
        ->select('actividad_alumno.*', 'alumno.nombre as nombre', 'alumno.apellidos as apellidos', 'equipo.nombre as equiponame', 'laboratorio.nombre as nombrelab')
        ->where('actividad_alumno.activo','=',1)
        ->where('fecha','>=',$request->inicio)
        ->where('fecha','<=',$request->fin)
        ->orderBy('fecha','DESC')
        ->paginate(20);

        return View::make('admin.historialcompleto',compact('historial'));
  }

    public function index(){
      
             
    
  }

    public function store(Request $request)
  	{
      $id = $request['id'];

      $nombre = $request['nombre'];
      $apellidos = $request['apellidos'];
      $password = $request['password'];
      $repeatPassword = $request['repeatPassword'];
      $passwordaux=0;
      if($password!=null){
        if($password==$repeatPassword)
        {
            $usertipo = \App\admin_model::find($id);
            
            $passwordaux=$usertipo->password;
            $usertipo->password=$password;
            $usertipo->nombre=$nombre;
            $usertipo->apellidos=$apellidos;
            $usertipo->save();

            $users = DB::table('users')
              ->select('users.*')    
              ->where('idUsuario','=',$passwordaux)
              ->first();

            $user = \App\User::find($users->id);
            $user->idUsuario=$password;
            $user->save();
            Session::flash('message','Actualizado corectamente'); 
            return redirect('/perfil-admin');  
        }
      }else{
        $usertipo = \App\admin_model::find($id);
            $usertipo->nombre=$nombre;
            $usertipo->apellidos=$apellidos;
            $usertipo->save();
            Session::flash('message','Actualizado corectamente'); 
            return redirect('/perfil-admin');  
      } 
     }

     public function info(){
      return View::make('admin.informacionTecnica');  
     }
}
