@include('includes.header')
@section('title', 'home Alumno')
<br><br><br><br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12"> 
                                <ul class="nav nav-tabs tabs tabs-top" style="width: 100%;">
                                    <li class="tab active" style="width: 33%;">
                                        <a id="docentelab" data-toggle="tab" aria-expanded="true" class="active"> 
                                            <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                            <span class="hidden-xs">LABORATORIOS</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab" style="width: 33%;"> 
                                        <a id="urlperfildocente" data-toggle="tab" aria-expanded="false" class=""> 
                                            <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                            <span class="hidden-xs">PERFIL</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab" style="width: 34%;"> 
                                        <a id="urlhistorialdocente" data-toggle="tab" aria-expanded="false" class=""> 
                                            <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
                                            <span class="hidden-xs">HISTORIAL</span> 
                                        </a> 
                                    </li> 
                                    <div class="indicator" style="right: 394px; left: 0px;"></div>
                                </ul> 
                                <div class="tab-content"> 
                                    <div class="tab-pane active" id="home-21" style="display: block;"> 
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel panel-color panel-success">
                                                    <div class="panel-heading">
                                                    <div class="row">
                                                    <div class="col-md-11">
                                                        <h3 class="panel-title m-t-0 header-title">LABORATORIOS</h3>
                                                    </div>
                                                        <div class="col-md-1">
                                                            @if(isset($session))
                                                             {!!Form::open(['action'=>'laboratorio_controller@stopsessiondocente','method'=>'POST'])!!}
                                                             <input type="hidden" name="id" value="{{$session->id}}">
                                                                <input type="hidden" name="idlab" value="{{$session->id_laboratorio}}">
                                                                <input type="hidden" name="iddocente" value="{{ Auth::user()->idUsuario }}">
                                                                {!!Form::submit('Detener',['class'=>'btn btn-danger waves-light'])!!}
                                                             {!!Form::close()!!}  
                                                             @endif
                                                        </div>
                                                    </div>
                                                    </div>
                                                    
<div class="panel-body">
@if(Session::has('messageError'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                    {{Session::get('messageError')}}
                    </div>
                @endif
@if(!isset($session))
    {!!Form::open(['action'=>'laboratorio_controller@signlaboratorio','method'=>'POST'])!!}
        <input type="hidden" name="iddocente" value="{{ Auth::user()->idUsuario}}">
        <div class="row">
        @if($laboratorios!=null)
        <div class="col-md-11 text-right">
              {!!Form::submit('Iniciar',['class'=>'btn btn-primary waves-light'])!!}
        </div>
        @endif
        <div class="form-group col-md-4">
            <label >Semestre</label>
            <select class="form-control select2" tabindex="-1" aria-hidden="true" name="semestre">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
            </select>
        </div>
        <div class="col-md-4">
        <div class="form-group ">
            <label >Grupo</label>
            <select class="form-control select2 " tabindex="-1" aria-hidden="true" name="grupo">
                     <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option >
            </select>
        </div>
        </div>
        <div class="form-group ">
        <div class="col-md-4">
            <label >Numero de alumnos</label>
            <div class="input-group "><input class="vertical-spin form-control" type="text" value="0" name="n_alumnos" style="display: block;"></div>
        </div>
        </div>
                                                     <div class="form-group col-md-6">
                                                                <label >Carrera</label>
                                                                <select class="form-control select2 " tabindex="-1" aria-hidden="true" name="carrera">
                                                                  <option value="LIC. SISTEMAS COMPUTACIONALES">LIC. SISTEMAS COMPUTACIONALES</option>
                                                                    <option value="ING. DESSARROLLO DE SOFTWARE">ING. DESSARROLLO DE SOFTWARE</option>
                                                                </select>
                                                            </div>

                                                             <div class="form-group col-md-6">
                {!!Form::label('Actividad','Actividad')!!}
                {!!Form::select('actividad', \App\activiti::lists('label','label'),'',['class'=>'form-control select2', 'required'=>'required'] )!!}
                                                               </div>

                                                    @foreach($laboratorios as $lab)
                                   
                                            <div class="col-md-4">
                                                <div class="mini-stat clearfix card-box">
                                                    @if($lab->estado==0)
                                                    <span class="mini-stat-icon bg-primary"><i class="fa  fa-institution text-white"></i></span>
                                                    <div class="mini-stat-info text-right text-dark">
                                                        <span class="counter text-dark" data-plugin="counterup">Libre  <input type='radio' id='inlineRadio1' value='{{$lab->id}}' name='id_labo' checked="" required="required"></span>
                                                       
                                                    @else
                                                    <span class="mini-stat-icon bg-danger"><i class="fa  fa-institution text-white"></i></span>
                                                    <div class="mini-stat-info text-right text-dark">
                                                        <span class="counter text-dark" data-plugin="counterup">Ocupado</span>
                                                    @endif
                                                        
                                                        {{$lab->nombre}}
                                                    </div>
                                                    <div class="tiles-progress">
                                                        <div class="m-t-20">
                                                            <h5 class="text-uppercase"> 
                                                            @if($lab->estado==1)
                                                                  @foreach($actividad as $act)
                                                                    @foreach($docentes as $docent)
                                                                    
                                                                        @if($lab->id==$act->id_laboratorio)
                                                                            @if($docent->n_plaza==$act->n_plaza)
                                                                                {{ $docent->nombre }}{{ $docent->apellidos }}
                                                                            @endif
                                                                        @endif
                                                                    
                                                                  @endforeach
                                                                @endforeach
                                                            @else
                                                            SIN PROFESOR
                                                            @endif
                                                            <span class="pull-right"></span></h5>
                                                            <div class="progress progress-sm m-0">
                                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                                    <span class="sr-only"></span>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>                                                
                                    @endforeach
                                                    </div>
                                                </div>
                                            </div> 
                                             {!!Form::close()!!}  
@else
<div class="text-center">
<h1> Sesión activa
 </h1>                                             
@foreach($laboratorios as $lab)
    @if($lab->id==$session->id_laboratorio)
        <h3>{{ $lab->nombre }}</h3>
        <h3><b>CARRERA:</b> {{ $session->carrera }} </h3><h3> <b>ACTIVIDAD:</b> {{ $session->actividad }}</h3>
    @endif
@endforeach
    
</div>
@endif

                                        </div>
                                    </div> 

                                    <div class="tab-pane" id="profile-21" style="display: block;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                            
                                        </div>
                                    </div>
                                    </div> 
                                </div> 
                </div>
            </div>
    </div> <!-- container -->




@include('includes.footer')
