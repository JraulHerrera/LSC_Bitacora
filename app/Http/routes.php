<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers:  'Content-Type, Accept, Authorization, X-Requested-With'");
header('Access-Control-Allow-Headers: Origin, Content-Type, *');

use Illuminate\Http\Request;
use App\Http\Requests;

//rutas control de registro y salir de session
Route::get('/','sesioncontroller@login');
Route::get('/logout','sesioncontroller@logout');
Route::resource('/register','RutasControlles@register');
Route::resource('/home/alumno','RutasControlles@homealumnos');
Route::resource('bitacora','logincontroller'); //login

//rutas para session de alumnos
Route::resource('alumno','alumno_controller');
Route::get('/perfil','alumno_controller@fnperfil'); 
Route::resource('/laboratorioalumno','alumno_controller@index');
Route::get('/historial/alumno','alumno_controller@historial');

Route::get('/historial/administrador','admin_controller@historialcompleto');
Route::post('/historial/busqueda','admin_controller@searchhistorial');      

Route::get('/historial/administrador/docente', 'admin_controller@historialcompletodocente');
Route::post('/historial/administrador/docente/busqueda','admin_controller@searchhistorialdocente'); 

//rutas para session de docentes
Route::resource('/docente','docente_controller');     
Route::resource('/laboratoriodocente','docente_controller@index');
Route::get('/docente-perfil','docente_controller@docenteperfil'); 
Route::get('/docente-historial','docente_controller@docentehistorial'); 

//rutas de logueo y registro
Route::resource('admin','admin_controller');   
Route::resource('tipo','tipo_controller');
Route::get('/info','admin_controller@info'); 

//actividades
Route::resource('actividades','activitycontroller');     
Route::get('actividad/nueva','activitycontroller@newactiviti'); 
Route::get('actividad/edit/{id}','activitycontroller@edit');
Route::get('actividad/actividaddel/{id}','activitycontroller@delete');


//materias
Route::resource('materias','materiasController');     
Route::get('materia/nueva','materiasController@newmateria'); 
Route::get('materia/edit/{id}','materiasController@edit');
Route::get('materia/actividaddel/{id}','materiasController@delete');



// Rutas para laboratorios administrador
Route::resource('laboratorios','laboratorio_controller');         
Route::get('/laboratorio','laboratorio_controller@lstlab');      
Route::get('laboratorio/nuevo','laboratorio_controller@index'); 
Route::get('laboratorios/edit/{id}','laboratorio_controller@edit');
Route::get('laboratorios/laboratoriodel/{id}','laboratorio_controller@delete');
Route::get('detail/laboratorio/{id}','laboratorio_controller@detailLabs');
Route::get('detail/laboratorio/alumno/{id}','equipos_controller@equiposdetail');

// Rutas para equipos administrador
Route::resource('equipos','equipos_controller');       
Route::get('/equipo','equipos_controller@lstequipo');
Route::post('/equipo/busqueda','equipos_controller@getequipo');       
Route::get('equipo/nuevo','equipos_controller@index'); 
Route::get('equipos/edit/{id}','equipos_controller@edit');
Route::get('equipos/equiposdel/{id}','equipos_controller@delete');
Route::get('/perfil-admin','admin_controller@perfiladmin');

//asignacion de laboratoros alumnos
Route::get('getequipo/{id}','equipos_controller@equiposlab'); 
Route::post('stopsession/','equipos_controller@stopsession'); 
Route::post('get/','equipos_controller@signlapb'); 
Route::post('stopsessiondocente/','laboratorio_controller@stopsessiondocente'); 
Route::resource('reporte','reporte_controller');  
Route::get('/reportes','reporte_controller@index');   
Route::post('signlaboratorio','laboratorio_controller@signlaboratorio');

//terminar session de laboratorio y equipos por el administrador
Route::get('equipo/stopadmin/{id}','actividad_alumnno_controller@stopsessionadmin');
Route::get('laboratorio/stopadmin/{id}','actividad_docente_controller@stopsessionadmin');