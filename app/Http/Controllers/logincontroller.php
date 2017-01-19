<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Response;
use Session;
use App\User;
use Hash;
use View;

class logincontroller extends Controller
{	
   
    public function store(Request $request)
    { 
        $nameUser=$request['usuario'];

        $useralum = DB::table('alumno')
        ->select('alumno.*')    
        ->wherematricula($nameUser)->whereactivo('1')->first();

        if ($useralum!=null) {
            $user= DB::table('users')
                    ->select('users.*')    
                    ->where('idUsuario','=',$useralum->matricula)->whereactivo('1')->first();
                    
          Auth::loginUsingId($user->id);
          return redirect('/laboratorioalumno');
        }
        else
        {
             $userdocente = DB::table('docente')
            ->select('docente.*')    
            ->wheren_plaza($nameUser)->whereactivo('1')->first();
            if ($userdocente!=null) {
                    $user= DB::table('users')
                    ->select('users.*')    
                    ->where('idUsuario','=',$userdocente->n_plaza)->whereactivo('1')->first();
                Auth::loginUsingId($user->id);
                return redirect('/laboratoriodocente');
            }
            else{
                 $useradmin = DB::table('admin')
                ->select('admin.*')    
                ->wherepassword($nameUser)->first();
                
                if($useradmin!=null){
                    $user= DB::table('users')
                    ->select('users.*')    
                    ->where('idUsuario','=',$useradmin->password)->first();
                     Auth::loginUsingId($user->id);
                      return redirect('/historial/administrador');
                }
                else{
                    Session::flash('messageError','Usuario incorrecto');
                    return redirect('/');
                }
            } 
        }


    }

    public function index()
    {
        return view('login');
    }
}
