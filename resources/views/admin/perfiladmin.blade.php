 @include('includes.header')
@section('title', 'home Alumno')
<br><br><br><br>
        <div class="container">
        @if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif
            <div class="row">
                <div class="col-md-12"> 
                                <ul class="nav nav-tabs tabs tabs-top" style="width: 100%;">
                                    <li class="tab" style="width: 25%;">
                                        <a href="/laboratorio" aria-expanded="false" class="" id="idadminhistorialcompleto"> 
                                            <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                            <span class="hidden-xs">HISTORIAL ALUM.</span> 
                                        </a> 
                                    </li>
                                    <li class="tab " style="width: 25%;"> 
                                        <a id="histodocente" data-toggle="tab" aria-expanded="true" class=""> 
                                            <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                            <span class="hidden-xs">HISTORIAL DOC.</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab " style="width: 25%;">
                                        <a href="/laboratorio" aria-expanded="false" class="" id="idLaboratorio"> 
                                            <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                            <span class="hidden-xs">LABORATORIOS</span> 
                                        </a> 
                                    </li>                                   
                                    <li class="tab" style="width: 25%;"> 
                                        <a href="/equipo" id="urlEquipo"> 
                                            <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
                                            <span class="hidden-xs">EQUIPOS</span> 
                                        </a> 
                                    </li>                                    
                                    <li class="tab" style="width: 25%;"> 
                                        <a id="idReportes" data-toggle="tab" aria-expanded="false" class=""> 
                                            <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                            <span class="hidden-xs">REPORTES</span> 
                                        </a> 
                                    </li> 
                                    
                                    <div class="indicator" style="right: 394px; left: 0px;"></div>
                                </ul>                               
                </div>
            </div>
    </div> <!-- container -->
<div class="container">
    <div style="background-color: white;">
        <br>
      <div class="tab-pane" id="profile-21" style="display: block;">
                                    <div class="row">
                                        <div class="col-md-12">
                                           
                                            {!!Form::open(['route'=>'admin.store','method'=>'POST'])!!}
                                            <div class="col-md-11 text-right">
                                            {!!Form::submit('ACTUALIZAR DATOS',['class'=>'btn btn-primary'])!!}
                                                 
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
                                                            <label >Nombre</label>
                                                            <input type="text" name="nombre" class="form-control" placeholder="Ingrese su nombre(s)" value="{{$user->nombre}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label >Apellidos</label>
                                                            <input type="text" name="apellidos" class="form-control" placeholder="Ingrese sus apellidos" value="{{$user->apellidos}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label >Contraseña</label>
                                                            <input type="text" name="password" class="form-control" placeholder="Ingrese su Matricula" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label >Repetir Contraseña</label>
                                                            <input type="text" name="repeatPassword" class="form-control" placeholder="Ingrese su Matricula" value="">
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

@include('includes.footer')