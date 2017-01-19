<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\Http\Requests;

class activitycontroller extends Controller
{
	public function index(){
		$actividades = DB::table('activitis')
          ->select('activitis.*')    
          ->whereactive('1')
          ->orderby('id','desc')
          ->get();
         return view('admin.listActivities', compact('actividades'));
	}
	public function newactiviti()
    {
        return view('admin.actividadesform');
    }

    public function store(Request $request)
    {
      $id = $request['id'];
      $label = $request['label'];
      $description = $request['description'];

      if($id=="0"){
        \App\activiti::create([
         'label'=>$label,
         'description'=>$description,
         'active'=>'1',
        ]);
      }else{
          $actividad = \App\activiti::find($id);
          $actividad->label=$label;
          $actividad->description=$description;
          $actividad->active='1';
          $actividad->save();

          
          Session::flash('message','Actividad Actualizado Correctamente');
          return redirect('/actividades');
      }
        Session::flash('message','Actividad Creado Correctamente');     
        return redirect('/actividades');
    }

    public function edit($id)
    { 
      $actividades = \App\activiti::find($id);
      return View('admin.actividadesform',compact('actividades')); 
    }

      public function delete($id)
    { 
       	try
        {
          \App\activiti::destroy($id);
          Session::flash('message','Actividad Eliminado Correctamente');
          return redirect('/actividades');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
          Session::flash('message-error','No se a Podido Eliminar el laboratorio');    
          return redirect('/actividades');
        }
        //Session::flash('message','Actividad Eliminada Correctamente');
        //return redirect('/actividades');
    }
}
