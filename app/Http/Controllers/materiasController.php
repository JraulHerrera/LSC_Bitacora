<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class materiasController extends Controller
{
    public function index(){
		$actividades = DB::table('activitis')
          ->select('activitis.*')    
          ->whereactive('1')
          ->orderby('id','desc')
          ->get();
         return view('admin.listMaterias', compact('actividades'));
	}
	public function newmateria()
    {
        return view('admin.materiaform');
    }

    public function store(Request $request)
    {
      $id = $request['id'];
      $label = $request['label'];
      $description = $request['description'];

      if($id=="0"){
        \App\materia::create([
         'label'=>$label,
         'description'=>$description,
         'active'=>'1',
        ]);
      }else{
          $actividad = \App\materia::find($id);
          $actividad->label=$label;
          $actividad->description=$description;
          $actividad->active='1';
          $actividad->save();

          
          Session::flash('message','Actividad Actualizado Correctamente');
          return redirect('/materias');
      }
        Session::flash('message','Actividad Creado Correctamente');     
        return redirect('/materias');
    }

    public function edit($id)
    { 
      $actividades = \App\materia::find($id);
      return View('admin.materiaform',compact('actividades')); 
    }

      public function delete($id)
    { 
       	try
        {
          \App\materia::destroy($id);
          Session::flash('message','Actividad Eliminado Correctamente');
          return redirect('/materias');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
          Session::flash('message-error','No se a Podido Eliminar el laboratorio');    
          return redirect('/materias');
        }
    }
}
