@include('includes.header')
@section('title', 'home Alumno')
<br><br><br><br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12"> 
                                <ul class="nav nav-tabs tabs tabs-top" style="width: 100%;">
                                    <li class="tab active" style="width: 33%;">
                                        <a href="#home-21" data-toggle="tab" aria-expanded="true" class="active"> 
                                            <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                            <span class="hidden-xs">LABORATORIOS</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab" style="width: 33%;"> 
                                        <a href="#profile-21" data-toggle="tab" aria-expanded="false" class=""> 
                                            <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                            <span class="hidden-xs">PERFIL</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab" style="width: 34%;"> 
                                        <a href="#messages-21" data-toggle="tab" aria-expanded="false" class=""> 
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
                                                        <h3 class="panel-title m-t-0 header-title">LABORATORIOS</h3>
                                                    </div>
                                                    <div class="panel-body">

                                                     <div class="form-group">
                                                                <label >Carrera</label>
                                                                <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="carrera">
                                                                  <option value="LIC. SISTEMAS COMPUTACIONALES">LIC. SISTEMAS COMPUTACIONALES</option>
                                                                    <option value="ING. DESSARROLLO DE SOFTWARE">ING. DESSARROLLO DE SOFTWARE</option>
                                                                </select>
                                                            </div>

                                                             <div class="form-group">
                                                                <label >Actividad</label>
                                                                <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="carrera">
                                                                    <option>Seleccione su carrera</option>
                                                                    <option value="INVESTIGACION">INVESTIGACION</option>
                                                                    <option value="PRACTICA">PRACTICA</option>
                                                                    <option value="PRACTICA">TAREA</option>
                                                                    <option value="PRACTICA">OTRO</option>
                                                                </select>
                                                            </div>

                                                    @foreach($laboratorios as $lab)
                                                         <a data-toggle="modal" data-target="#panel-modal">
                                                        <div class="col-md-4">
                                                            <div class="mini-stat clearfix card-box">
                                                                <span class="mini-stat-icon bg-info"><i class="fa  fa-institution text-white"></i></span>
                                                                <div class="mini-stat-info text-right text-dark">
                                                                    <span class="counter text-dark" data-plugin="counterup">OCUPADO</span>
                                                                    {{$lab->nombre}}
                                                                </div>
                                                                <div class="tiles-progress">
                                                                    <div class="m-t-20">
                                                                        <h5 class="text-uppercase">REBECA ROMAN JULIAN <span class="pull-right"></span></h5>
                                                                        <div class="progress progress-sm m-0">
                                                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                                                <span class="sr-only"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>                                       
                                                    @endForeach
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div> 

                                    <div class="tab-pane" id="profile-21" style="display: block;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="m-t-0 header-title"><b>Actualización de datos</b></h4>
                                            {!!Form::open(['route'=>'docente.store','method'=>'POST'])!!}
                                            <div class="col-md-11 text-right">
                                            {!!Form::submit('ACTUALIZAR DATOS',['class'=>'btn btn-primary'])!!}
                                                 <a href="/" class="btn btn-danger"><span class="ti-back-left"></span></a>
                                                  <p></p>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="panel panel-success panel-border">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Datos personales</h3>
                                                    </div>
                                                    <input type="hidden" name="id" value="{{$user->id}}">
                                                    <div class="panel-body">
                                                         <div class="form-group">
                                                            <label >N° de plaza</label>
                                                            <input type="text" name="plaza" class="form-control" placeholder="Ingrese su Matricula" value="{{$user->n_plaza}}">
                                                        </div>
                                                       <div class="form-group">
                                                            <label >Nombre</label>
                                                            <input type="text" name="nombre" class="form-control" placeholder="Ingrese su nombre(s)" value="{{$user->nombre}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label >Apellidos</label>
                                                            <input type="text" name="apellidos" class="form-control" placeholder="Ingrese sus apellidos" value="{{$user->apellidos}}">
                                                        </div>
                                                    </div>
                                                </div>
                                             </div>
                                            {!!Form::close()!!}  
                                        </div>
                                    </div>
                                    </div> 
                                </div> 
                </div>
            </div>
    </div> <!-- container -->


@include('includes.footer')
