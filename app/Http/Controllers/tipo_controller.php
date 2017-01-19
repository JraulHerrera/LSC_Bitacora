<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use App;
use Auth;
use Session;

class tipo_controller extends Controller
{
    public function store(Request $request)
  	{   
      $alumno = $request['radioInline'];
      if($alumno=="alumno"){
      	 return view('newuserForm');
      }if($alumno=="docente"){
      	 return view('docenteForm');
      }
  	}
}
