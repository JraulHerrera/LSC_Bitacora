<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\alumno_model;
use DB;
use View;
use Auth;
use Session;
class alumno_controller extends Controller
{
    public function index()
    {
      $laboratorios = DB::table('laboratorio')
        ->select('laboratorio.*')  
        ->where('laboratorio.activo','=','1')
        ->groupBy('laboratorio.id')
        ->get();
      $actividad= DB::table('actividad_docente')
        ->select('actividad_docente.*')
        ->whereestado('1')
        ->get();

      $docentes = DB::table('docente')
        ->select('docente.*')    
        ->whereactivo('1')->get();

      return View::make('alumno.laboratorio',compact('laboratorios','docentes', 'actividad'));        
    }

    public function historial(){
      $historial = DB::table('actividad_alumno')
        ->select('actividad_alumno.*')    
        ->whereactivo('1')
        ->wherematricula(Auth::user()->idUsuario)
        ->orderBy('id', 'fecha', 'DESC')
        ->paginate(10);
        return View::make('alumno.historial',compact('historial'));  
    }

    public function store(Request $request)
  	{   
      $id = $request['id'];
      $matricula = $request['matricula'];
      $nombre = $request['nombre'];
      $apellidos = $request['apellidos'];
      $carrera = $request['carrera'];
      $semestre = $request['semestre'];
      $grupo = $request['grupo'];

      $usuariorepit = DB::table('alumno')
          ->select('alumno.*')    
          ->whereactivo('1')->wherematricula($matricula)->first();


      
      if($id=="0"){
        if($usuariorepit==null){
       \App\alumno_model::create([
         'matricula'=>$matricula,
         'nombre'=>$nombre,
         'apellidos'=>$apellidos,
         'carrera'=>$carrera,
         'semestre'=>$semestre,
         'grupo'=>$grupo,
         'activo'=>'1',
        ]);

       $usuario = DB::table('alumno')
          ->select('alumno.*')    
          ->whereactivo('1')->wherematricula($matricula)->first();

       \App\user::create([
         'idUsuario'=>$matricula,
         'tipo'=>"ALUMNO",
         'activo'=>'1',
        ]);
       Session::flash('message','Usuario registrado, inicie sessión con su matrícula');
       return view('login');
       }
        Session::flash('messageError','Usuario ya existe');
       return view('login');
     }else{
          $user = \App\alumno_model::find($id);
          $user->matricula=$matricula;
          $user->nombre=$nombre;
          $user->apellidos=$apellidos;
          $user->carrera=$carrera;
          $user->semestre=$semestre;
          $user->grupo=$grupo;
          $user->activo='1';
          $user->save();

          $laboratorios = DB::table('laboratorio')
          ->select('laboratorio.*')    
          ->whereactivo('1')->get();

          return redirect('/perfil');
        }
      
     }


     public function fnperfil(){
       $user = DB::table('alumno')
          ->select('alumno.*')    
          ->whereactivo('1')->wherematricula(Auth::user()->idUsuario)->first();
      return View::make('alumno.perfilAlumno',compact('user'));  
     }
}
