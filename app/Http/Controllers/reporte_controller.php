<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
	  
class reporte_controller extends Controller
{
	
	public function store(Request $request){
        $ciclo_inicio = $request['ciclo_inicio'];
        $ciclo_fin = $request['ciclo_fin'];
	    $fecha_inicio = $request['fecha_inicio'];
        $fecha_fin = $request['fecha_fin'];
        $formato = $request['formato'];//pdf
        $reporte = $request['reporte'];//actividad_alumno
        $id_laboratorio = $request['id_laboratorio'];//pdf

        if($reporte=="LABORATORIOS"){
                 $mes_inicio="";
                 $mes_fin="";
                 $ano_inicio = explode('-',$fecha_inicio);
                 $ano_fin = explode('-',$fecha_fin);
                 $mes_inicio = explode('-',$fecha_inicio);
                 $mes_fin = explode('-',$fecha_fin);

                 $mes_inicio=$this->obtenerMes($mes_inicio[1]);
                 $mes_fin=$this->obtenerMes($mes_fin[1]);

                 $anno="";
                 if($ano_inicio[0]==$ano_fin[0]){
                    $anno=$ano_inicio[0];
                 }else{
                    $anno=$ano_inicio[0]." - ".$ano_fin[0];
                 }
            

            if($formato=="PDF"){
                $laboratorios = DB::table('laboratorio')
                 ->select('laboratorio.*')    
                 ->whereactivo('1')->get();

                 $equipos = DB::table('equipo')
                 ->select('equipo.*')    
                 ->whereactivo('1')->get();
                 
                $pdf = \PDF::loadView('reportes.laboratorio_pdf',['laboratorios'=>$laboratorios,'equipos'=>$equipos,'anno'=>$anno,'mes_inicio'=>$mes_inicio,'mes_fin'=>$mes_fin]);
                return $pdf->download('laboratorios.pdf');
            } 

            if($formato=="EXCEL"){  
                                     \Excel::create('laboratorios', function($excel) use ($anno,$mes_inicio,$mes_fin){
                                        $excel->sheet('laboratorios',function($sheet) use ($anno,$mes_inicio,$mes_fin) {
                                            
                                        $laboratorios='';
                                        $equipos='';

                                         
                                         $laboratorios = DB::table('laboratorio')
                                         ->select('laboratorio.*')    
                                         ->whereactivo('1')->get();

                                         $equipos = DB::table('equipo')
                                         ->select('equipo.*')    
                                         ->whereactivo('1')->get();
                                         
                                    
                                        $sheet->loadView('reportes.laboratorio_excel')->with('laboratorios',$laboratorios)->with('equipos',$equipos)->with('anno',$anno)->with('mes_inicio',$mes_inicio)->with('mes_fin',$mes_fin);
                                    });
                                    })->export('xls');
                   
            }


            }


/****************************************************************************************/
/******************************************* Equipos ************************************/
/****************************************************************************************/

            if($reporte=="EQUIPOS"){

                 $mes_inicio="";
                 $mes_fin="";
                 $ano_inicio = explode('-',$ciclo_inicio);
                 $ano_fin = explode('-',$ciclo_fin);
                 $mes_inicio = explode('-',$ciclo_inicio);
                 $mes_fin = explode('-',$ciclo_fin);

                 $mes_inicio=$this->obtenerMes($mes_inicio[1]);
                 $mes_fin=$this->obtenerMes($mes_fin[1]);

                 $anno="";
                 if($ano_inicio[0]==$ano_fin[0]){
                    $anno=$ano_inicio[0];
                 }else{
                    $anno=$ano_inicio[0]." - ".$ano_fin[0];
                 }
          
                    if($formato=="PDF"){
                        $laboratorios = DB::table('laboratorio')
                         ->select('laboratorio.*')    
                         ->whereactivo('1')->get();

                         $equipos = DB::table('equipo')
                         ->select('equipo.*')    
                         ->where('created_at','>=',$fecha_inicio ." 00:00:00")
                         ->where('created_at','<=',$fecha_fin." 23:59:59")->where('activo','=','1')->get();
                 
                        $pdf = \PDF::loadView('reportes.equipo_pdf',['laboratorios'=>$laboratorios,'equipos'=>$equipos,'anno'=>$anno,'mes_inicio'=>$mes_inicio,'mes_fin'=>$mes_fin]);
                        return $pdf->download('equipos.pdf');
                    } 

           if($formato=="EXCEL"){
                            \Excel::create('equipos', function($excel)  use ($anno,$mes_inicio,$mes_fin,$fecha_inicio,$fecha_fin){         
                                        $excel->sheet('equipos', function($sheet) use ($anno,$mes_inicio,$mes_fin,$fecha_inicio,$fecha_fin){
                                        $laboratorios='';
                                        $equipos='';

                                        $laboratorios = DB::table('laboratorio')
                                         ->select('laboratorio.*')    
                                         ->whereactivo('1')->get();

                                         $equipos = DB::table('equipo')
                                         ->select('equipo.*')    
                                         ->where('created_at','>=',$fecha_inicio ." 00:00:00")
                                         ->where('created_at','<=',$fecha_fin." 23:59:59")->where('activo','=','1')->get();
                                         
                                    
                                        $sheet->loadView('reportes.equipo_excel')->with('laboratorios',$laboratorios)->with('equipos',$equipos)->with('anno',$anno)->with('mes_inicio',$mes_inicio)->with('mes_fin',$mes_fin);
                                    });
                                    })->export('xls');
            }


            }

/****************************************************************************************/
/******************************************* Alumnos ************************************/
/****************************************************************************************/

            if($reporte=="ALUMNOS"){
                 $mes_inicio="";
                 $mes_fin="";
                 $ano_inicio = explode('-',$ciclo_inicio);
                 $ano_fin = explode('-',$ciclo_fin);
                 $mes_inicio = explode('-',$ciclo_inicio);
                 $mes_fin = explode('-',$ciclo_fin);

                 $mes_inicio=$this->obtenerMes($mes_inicio[1]);
                 $mes_fin=$this->obtenerMes($mes_fin[1]);

                 $anno="";
                 if($ano_inicio[0]==$ano_fin[0]){
                    $anno=$ano_inicio[0];
                 }else{
                    $anno=$ano_inicio[0]." - ".$ano_fin[0];
                 }

                    if($formato=="PDF"){
                        $alumno = DB::table('alumno')
                         ->select('alumno.*')    
                         ->where('created_at','>=',$fecha_inicio ." 00:00:00")
                         ->where('created_at','<=',$fecha_fin." 23:59:59")->where('activo','=','1')->orderBy('carrera', 'desc') ->orderBy('semestre', 'desc') ->orderBy('grupo', 'desc') ->orderBy('apellidos', 'desc')->get();
                 
                        $pdf = \PDF::loadView('reportes.alumno_pdf',['alumno'=>$alumno,'anno'=>$anno,'mes_inicio'=>$mes_inicio,'mes_fin'=>$mes_fin]);
                        return $pdf->download('alumnos.pdf');
             }

             if($formato=="EXCEL"){
                \Excel::create('alumnos', function($excel)use ($anno,$mes_inicio,$mes_fin,$fecha_inicio,$fecha_fin) {
         
                                        $excel->sheet('alumnos', function($sheet) use ($anno,$mes_inicio,$mes_fin,$fecha_inicio,$fecha_fin){
                                        $alumno='';

                                         $alumno = DB::table('alumno')
                         ->select('alumno.*')    
                         ->where('created_at','>=',$fecha_inicio ." 00:00:00")
                         ->where('created_at','<=',$fecha_fin." 23:59:59")->where('activo','=','1')->orderBy('carrera', 'desc') ->orderBy('semestre', 'desc') ->orderBy('grupo', 'desc') ->orderBy('apellidos', 'desc')->get();
                                         
                                    
                                        $sheet->loadView('reportes.alumno_excel')->with('alumno',$alumno)->with('anno',$anno)->with('mes_inicio',$mes_inicio)->with('mes_fin',$mes_fin);
                                    });
                                    })->export('xls');
             }
            }

/****************************************************************************************/
/******************************************* Profesores ************************************/
/****************************************************************************************/

            if($reporte=="PROFESORES"){
                 $mes_inicio="";
                 $mes_fin="";
                 $ano_inicio = explode('-',$ciclo_inicio);
                 $ano_fin = explode('-',$ciclo_fin);
                 $mes_inicio = explode('-',$ciclo_inicio);
                 $mes_fin = explode('-',$ciclo_fin);

                 $mes_inicio=$this->obtenerMes($mes_inicio[1]);
                 $mes_fin=$this->obtenerMes($mes_fin[1]);

                 $anno="";
                 if($ano_inicio[0]==$ano_fin[0]){
                    $anno=$ano_inicio[0];
                 }else{
                    $anno=$ano_inicio[0]." - ".$ano_fin[0];
                 }

                    if($formato=="PDF"){
                        $docente = DB::table('docente')
                         ->select('docente.*')    
                         ->where('created_at','>=',$fecha_inicio ." 00:00:00")
                         ->where('created_at','<=',$fecha_fin." 23:59:59")->where('activo','=','1')->orderBy('n_plaza', 'desc') ->orderBy('apellidos', 'desc')->get();
                 
                        $pdf = \PDF::loadView('reportes.docente_pdf',['docente'=>$docente,'anno'=>$anno,'mes_inicio'=>$mes_inicio,'mes_fin'=>$mes_fin]);
                        return $pdf->download('docentes.pdf');
             }

             if($formato=="EXCEL"){
                \Excel::create('docentes', function($excel) use ($anno,$mes_inicio,$mes_fin,$fecha_inicio,$fecha_fin) {
         
                                        $excel->sheet('docentes', function($sheet) use ($anno,$mes_inicio,$mes_fin,$fecha_inicio,$fecha_fin) {
                                        $docente='';

                                        $docente = DB::table('docente')
                                         ->select('docente.*')    
                                         ->whereactivo('1') ->orderBy('n_plaza', 'desc') ->orderBy('apellidos', 'desc')->get();
                                    
                                        $sheet->loadView('reportes.docente_excel')->with('docente',$docente)->with('anno',$anno)->with('mes_inicio',$mes_inicio)->with('mes_fin',$mes_fin);
                                    });
                                    })->export('xls');
             }
            }

/****************************************************************************************/
/******************************************* Actividad alumno ***************************/
/****************************************************************************************/

            if($reporte=="ACT_ALUMNO"){
                 $mes_inicio="";
                 $mes_fin="";
                 $ano_inicio = explode('-',$ciclo_inicio);
                 $ano_fin = explode('-',$ciclo_fin);
                 $mes_inicio = explode('-',$ciclo_inicio);
                 $mes_fin = explode('-',$ciclo_fin);

                 $mes_inicio=$this->obtenerMes($mes_inicio[1]);
                 $mes_fin=$this->obtenerMes($mes_fin[1]);

                 $anno="";
                 if($ano_inicio[0]==$ano_fin[0]){
                    $anno=$ano_inicio[0];
                 }else{
                    $anno=$ano_inicio[0]." - ".$ano_fin[0];
                 }

                    if($formato=="PDF"){
                        $actividades = DB::table('actividad_alumno')
                         ->select('actividad_alumno.*')    
                         ->where('fecha','>=',$fecha_inicio ." 00:00:00")
                         ->where('fecha','<=',$fecha_fin." 23:59:59")->where('id_laboratorio','=',$id_laboratorio)->where('activo','=','1')->orderBy('fecha', 'desc')->get();

                         $alumnos = DB::table('alumno')
                         ->select('alumno.*')    
                         ->whereactivo('1')->get();

                          $lab = DB::table('laboratorio')
                         ->select('laboratorio.*')    
                         ->whereid($id_laboratorio)->first();

                          $nombreLab = $lab->nombre;
                 
                        $pdf = \PDF::loadView('reportes.actividad_alumno_pdf',['actividades'=>$actividades,'alumnos'=>$alumnos,'anno'=>$anno,'mes_inicio'=>$mes_inicio,'mes_fin'=>$mes_fin,'nombreLab'=>$nombreLab]);
                        return $pdf->download('actividad_alumnos.pdf');
             }

             if($formato=="EXCEL"){
                \Excel::create('actividad_alumnos', function($excel) use ($anno,$mes_inicio,$mes_fin,$fecha_inicio,$fecha_fin,$id_laboratorio){
         
                                        $excel->sheet('actividad_alumnos', function($sheet) use ($anno,$mes_inicio,$mes_fin,$fecha_inicio,$fecha_fin,$id_laboratorio){
                                        $actividades='';
                                        $alumnos='';

                                          $actividades = DB::table('actividad_alumno')
                                         ->select('actividad_alumno.*')    
                                         ->where('fecha','>=',$fecha_inicio ." 00:00:00")
                                         ->where('fecha','<=',$fecha_fin." 23:59:59")->where('id_laboratorio','=',$id_laboratorio)->where('activo','=','1')->orderBy('fecha', 'desc')->get();

                                         $alumnos = DB::table('alumno')
                                         ->select('alumno.*')    
                                         ->whereactivo('1')->get();

                                          $lab = DB::table('laboratorio')
                                          ->select('laboratorio.*')    
                                          ->whereid($id_laboratorio)->first();

                                          $nombreLab = $lab->nombre;
                                    
                                        $sheet->loadView('reportes.actividad_alumno_excel')->with('actividades',$actividades)->with('alumnos',$alumnos)->with('anno',$anno)->with('mes_inicio',$mes_inicio)->with('mes_fin',$mes_fin)->with('nombreLab',$nombreLab);
                                    });
                                    })->export('xls');
             }
            }

/****************************************************************************************/
/******************************************* Actividad profesor ***************************/
/****************************************************************************************/

            if($reporte=="ACT_PROFESOR"){
                 $mes_inicio="";
                 $mes_fin="";
                 $ano_inicio = explode('-',$ciclo_inicio);
                 $ano_fin = explode('-',$ciclo_fin);
                 $mes_inicio = explode('-',$ciclo_inicio);
                 $mes_fin = explode('-',$ciclo_fin);

                 $mes_inicio=$this->obtenerMes($mes_inicio[1]);
                 $mes_fin=$this->obtenerMes($mes_fin[1]);

                 $anno="";
                 if($ano_inicio[0]==$ano_fin[0]){
                    $anno=$ano_inicio[0];
                 }else{
                    $anno=$ano_inicio[0]." - ".$ano_fin[0];
                 }

                    if($formato=="PDF"){
                        $actividades = DB::table('actividad_docente')
                         ->select('actividad_docente.*')    
                         ->where('fecha','>=',$fecha_inicio)
                         ->where('fecha','<=',$fecha_fin)->where('id_laboratorio','=',$id_laboratorio)->where('activo','=','1')->orderBy('fecha', 'desc')->get();

                         $docentes = DB::table('docente')
                         ->select('docente.*')    
                         ->whereactivo('1')->get();

                          $lab = DB::table('laboratorio')
                         ->select('laboratorio.*')     
                         ->whereid($id_laboratorio)->first();

                          $nombreLab = $lab->nombre;
                 
                        $pdf = \PDF::loadView('reportes.actividad_profesor_pdf',['actividades'=>$actividades,'docentes'=>$docentes,'anno'=>$anno,'mes_inicio'=>$mes_inicio,'mes_fin'=>$mes_fin,'nombreLab'=>$nombreLab]);
                        return $pdf->download('actividad_docentes.pdf');

                        /*->setPaper('a4', 'landscape');/
                        return $pdf->download('actividad_profesor.pdf');*/
             }

             if($formato=="EXCEL"){
                \Excel::create('actividad_docentes', function($excel) use ($anno,$mes_inicio,$mes_fin,$fecha_inicio,$fecha_fin,$id_laboratorio){
         
                                        $excel->sheet('actividad_docentes', function($sheet) use ($anno,$mes_inicio,$mes_fin,$fecha_inicio,$fecha_fin,$id_laboratorio){
                                        $actividades='';
                                        $docentes='';

                                         $actividades = DB::table('actividad_docente')
                                         ->select('actividad_docente.*')    
                                         ->where('fecha','>=',$fecha_inicio)
                                         ->where('fecha','<=',$fecha_fin)->where('id_laboratorio','=',$id_laboratorio)->where('activo','=','1')->orderBy('fecha', 'desc')->get();

                                         $docentes = DB::table('docente')
                                         ->select('docente.*')    
                                         ->whereactivo('1')->get();
                 
                                    
                                        $sheet->loadView('reportes.actividad_profesor_excel')->with('actividades',$actividades)->with('docentes',$docentes)->with('anno',$anno)->with('mes_inicio',$mes_inicio)->with('mes_fin',$mes_fin);
                                    });
                                    })->export('xls');
             }
            }



    }

     /*   
 
        $laboratorios = DB::table('laboratorio')
         ->select('laboratorio.*')    
         ->whereactivo('1')->get();
 
        $pdf = \PDF::loadView('reportes.laboratorio_pdf',['laboratorios'=>$laboratorios,'laboratorios2'=>$laboratorios]);
        return $pdf->download('laboratorios.pdf');



     \Excel::create('New file', function($excel) {
 
 	    $excel->sheet('New sheet', function($sheet) {
 	    	$laboratorios='';
         $laboratorios2='';
         $laboratorios = DB::table('laboratorio')
         ->select('laboratorio.*')    
         ->whereactivo('1')->get();
 
         $laboratorios2 = DB::table('laboratorio')
         ->select('laboratorio.*')    
         ->whereactivo('1')->get();
         
	
 	    $sheet->loadView('reportes.laboratorio_pdf')->with('laboratorios',$laboratorios)
                                      ->with('laboratorios2',$laboratorios2);
 	    })->export('xls');
 	    */



 	    public function index(){
 	    	return view('reportes.reporte');
 	    }

        function obtenerMes($mes){
            if($mes=="01"){
                return "ENERO";
            }if ($mes=="02") {
              return "FEBRERO";
            }if ($mes=="03") {
              return "MARZO";
            }if ($mes=="04") {
              return "ABRIL";
            }if ($mes=="05") {
              return "MAYO";
            }if ($mes=="06") {
              return "JUNIO";
            }if ($mes=="07") {
              return "JULIO";
            }if ($mes=="08") {
              return "AGOSTO";
            }if ($mes=="09") {
              return "SEPTIEMBRE";
            }if ($mes=="10") {
              return "OCTUBRE";
            }if ($mes=="11") {
              return "NOVIEMBRE";
            }if ($mes=="12") {
              return "DICIEMBRE";
            }

            return "no se enontro";
        }
}
