<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Session;
use App\User;
use App\perfiles;
use App\ubicaciones;
use Auth;
use Redirect;

class usuariocontroller extends Controller
{    
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function store(Request $request){
     	$activo=0;

     	$contrasena=md5($request['contrasena']);		

		if($request['activo']=="si")
		{	
			$activo=1;
		}		

	    User::create([
	            		'usuario'=>$request['usuario'],
	            		'nombre'=>$request['nombre'],
	            		'contrasena'=>$contrasena,
	            		'perfiles_id'=>$request['perfil'],
	            		'ubicaciones_id'=>$request['ubicacion'],
	            		'activo'=>$activo
	            	]);

	   $usuarios = DB::table('usuarios')  
            ->join('perfiles','usuarios.perfiles_id','=','perfiles.id')  
            ->join('ubicaciones','usuarios.ubicaciones_id','=','ubicaciones.id')  
            ->select('usuarios.*','perfiles.perfil', 'perfiles.id as perfilid','ubicaciones.ubicacion','ubicaciones.id as ubicacionid')
            ->paginate(10);

        Session::flash('message','Usuario Agregado Correctamente');  

	    return view('usuarios',compact('usuarios'));
    }

    public function index(){
    	 $usuarios = DB::table('usuarios')  
            ->join('perfiles','usuarios.perfiles_id','=','perfiles.id')  
            ->join('ubicaciones','usuarios.ubicaciones_id','=','ubicaciones.id')  
            ->select('usuarios.*','perfiles.perfil', 'perfiles.id as perfilid','ubicaciones.ubicacion','ubicaciones.id as ubicacionid')
            ->paginate(10);
           
	   return view('usuarios',compact('usuarios'));
    }

     public function delete($id)
     { 
        try
        {
            User::destroy($id);

            Session::flash('message','Usuario Eliminado Correctamente');
        	return redirect('/usuarios');
        }

        catch(\Illuminate\Database\QueryException $e)
        {
            Session::flash('message-error','No se a Podido Eliminar el Usuario');    
            return redirect('/usuarios');
        }
      }

    public function update(Request $request)
    { 
        $id=$request['id']; 
        $usuario=$request['usuario'];
        $nombre=$request['nombre'];
        $perfiles_id=$request['perfiles_id']; 
        $ubicaciones_id=$request['ubicaciones_id'];
        $activo=0;

        if($request['activo']==1){
            $activo=1;
        }

        DB::update('update usuarios set usuario = ?, nombre = ?, perfiles_id = ?, ubicaciones_id = ?, activo = ?  where id = ? ',array($usuario, $nombre, $perfiles_id, $ubicaciones_id, $activo, $id));


        Session::flash('message','Usuario Actualizado Correctamente');     
        return redirect('/usuarios');
    }


}
