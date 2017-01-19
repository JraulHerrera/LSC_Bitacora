<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use View;
use Session;
class docente_controller extends Controller
{ 
    public function index()
    {
      $session = DB::table('actividad_docente')
          ->select('actividad_docente.*')
           ->where('actividad_docente.estado','=', 1)
           ->where('actividad_docente.n_plaza','=', Auth::user()->idUsuario)
          ->first();
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

        return View::make('docente.laboratoriosdocente',compact('laboratorios','session', 'docentes', 'actividad'));  
               
    }

    public function docenteperfil(){
       $user = DB::table('docente')
          ->select('docente.*')    
          ->whereactivo('1')->wheren_plaza(Auth::user()->idUsuario)->first();
          
      return View::make('docente.perfil',compact('user'));  
     }
    public function docentehistorial(){
       $historial = DB::table('actividad_docente')
        ->join('laboratorio', 'laboratorio.id', '=', 'actividad_docente.id_laboratorio')
        ->select('actividad_docente.*','laboratorio.nombre as labname')  
        ->where('actividad_docente.activo','=','1')
        ->wheren_plaza(Auth::user()->idUsuario)
        ->orderBy('actividad_docente.id','DESC')
        ->paginate(10);
        return View::make('docente.historial',compact('historial'));  
    }


    public function show(){

    }
    public function store(Request $request)
  	{   
      $id = $request['id'];
      $plaza = $request['plaza'];
      $nombre = $request['nombre'];
      $apellidos = $request['apellidos'];
      $usuariorepit = DB::table('docente')
          ->select('docente.*')    
          ->whereactivo('1')->wheren_plaza($plaza)->first();

      

      if($id=="0"){
        if($usuariorepit==null){
       \App\docente_model::create([
         'n_plaza'=>$plaza,
         'nombre'=>$nombre,
         'apellidos'=>$apellidos,
         'activo'=>'1',
        ]);

       $usuario = DB::table('docente')
          ->select('docente.*')    
          ->whereactivo('1')->wheren_plaza($plaza)->first();

          /********************************/

       \App\user::create([
         'idUsuario'=>$plaza,
         'tipo'=>"DOCENTE",
         'activo'=>'1',
        ]);


       Session::flash('message','Usuario registrado correctamente, puede iniciar sesión');
       return view('login');
        }
        Session::flash('messageError','Usuario ya existe');
        return view('login');
      }else{
          $user = \App\docente_model::find($id);
          $user->n_plaza=$plaza;
          $user->nombre=$nombre;
          $user->apellidos=$apellidos;
          $user->activo='1';
          $user->save();

          $laboratorios = DB::table('laboratorio')
          ->select('laboratorio.*')    
          ->whereactivo('1')->get();

          return redirect('/docente-perfil');
      }
    
    

  	}
}
