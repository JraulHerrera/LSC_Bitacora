@include('includes.header')
@section('title', 'home Alumno')
<br><br><br><br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12"> 
                                <ul class="nav nav-tabs tabs tabs-top" style="width: 100%;">
                                    <li class="tab " style="width: 33%;">
                                        <a id="docentelab" data-toggle="tab" aria-expanded="false" class=""> 
                                            <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                            <span class="hidden-xs">LABORATORIOS</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab active" style="width: 33%;"> 
                                        <a id="urlperfildocente" data-toggle="tab" aria-expanded="true" class="active"> 
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
                                
                                    <div class="tab-pane" id="profile-21" style="display: block;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                            {!!Form::open(['route'=>'docente.store','method'=>'POST'])!!}

                                            <div class="col-md-11 text-right">
                                            {!!Form::submit('ACTUALIZAR DATOS',['class'=>'btn btn-primary'])!!}
                                             <p></p> <p></p>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="panel panel-success panel-border">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Datos personales</h3>
                                                    </div>
                                                    <input type="hidden" name="id" value="{{$user->id}}">
                                                    <div class="panel-body">
                                                         <div class="form-group">
                                                            <label >N° de plaza</label> <span class="text-danger"> *Contraseña</span>
                                                            <input type="text" name="plaza" class="form-control" placeholder="Ingrese su Matricula" value="{{$user->n_plaza}}" readonly="readonly" required="required">
                                                        </div>
                                                       <div class="form-group">
                                                            <label >Nombre</label>
                                                            <input type="text" name="nombre" class="form-control" placeholder="Ingrese su nombre(s)" value="{{$user->nombre}}" required="required">
                                                        </div>
                                                        <div class="form-group">
                                                            <label >Apellidos</label>
                                                            <input type="text" name="apellidos" class="form-control" placeholder="Ingrese sus apellidos" value="{{$user->apellidos}}" required="required">
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
