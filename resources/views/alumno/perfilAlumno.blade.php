@include('includes.header')
@section('title', 'home Alumno')
<br><br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-12"> 
                                <ul class="nav nav-tabs tabs tabs-top" style="width: 100%;">
                                    <li class="tab" style="width: 33.3333%;">
                                        <a aria-expanded="false" class="" id="urlalumnolaboratorio"> 
                                            <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                            <span class="hidden-xs">LABORATORIOS</span> 
                                        </a> 
                                    </li>                                   
                                    <li class="tab active" style="width: 33.3333%;"> 
                                        <a id="urlperfilalumno" data-toggle="tab" aria-expanded="true" class="active"> 
                                            <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                            <span class="hidden-xs">PERFIL</span> 
                                        </a> 
                                    </li>
                                    <li class="tab" style="width: 33.3333%;"> 
                                        <a id="urlhistorialalumno" data-toggle="tab" aria-expanded="false" class=""> 
                                            <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                            <span class="hidden-xs">HISTORIAL</span> 
                                        </a> 
                                    </li> 
                                    <div class="indicator" style="right: 446px; left: 445px;"></div>
                                <div class="indicator" style="right: 446px; left: 445px;"></div></ul> 
                </div>
            </div>
    </div> <!-- container -->
<div class="container">
    <div style="background-color: white;">
        <br>
        <div class="container"> <br>
            
                                           {!!Form::open(['route'=>'alumno.store','method'=>'POST'])!!}
                                            <div class="col-md-11 text-right">
                                            {!!Form::submit('ACTUALIZAR DATOS',['class'=>'btn btn-primary waves-light'])!!}
                                                 <p></p>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="panel panel-success panel-border">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Datos personales</h3>
                                                    </div>

                                                     <input type="hidden" name="id" value="{{$user->id}}">

                                                    <div class="panel-body">
                                                         <div class="form-group">
                                                            <label >Matricula </label> <span class="text-danger"> *Tu contraseña</span>
                                                            <input type="text" name="matricula" class="form-control" placeholder="Ingrese su Matricula" value="{{$user->matricula}}" readonly="readonly" required="required">
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
                                                <div class="col-md-6">
                                                    <div class="panel panel-purple panel-border">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Datos Academicos</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="form-group">
                                                                <label >Carrera</label>
                                                                <select class="form-control select2" tabindex="-1" aria-hidden="true" name="carrera">
                                                                    <option>{{$user->carrera}}</option>
                                                                    <option value="LIC. SISTEMAS COMPUTACIONALES">LIC. SISTEMAS COMPUTACIONALES</option>
                                                                    <option value="ING. DESSARROLLO DE SOFTWARE">ING. DESSARROLLO DE SOFTWARE</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label >Semestre</label>
                                                                 <select class="form-control select2 " tabindex="-1" aria-hidden="true" name="semestre">
                                                                 <option value="1">{{$user->semestre}}</option>
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
                                                            <div class="form-group">
                                                                <label >Grupo</label>
                                                                 <select class="form-control select2" tabindex="-1" aria-hidden="true" name="grupo">
                                                                  <option value="A">{{$user->grupo}}</option>
                                                                  <option value="A">A</option>
                                                                  <option value="B">B</option>
                                                                  <option value="C">C</option>
                                                                  <option value="D">D</option>
                                                                  <option value="E">E</option>        
                                                                </select>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            {!!Form::close()!!} 
        </div>
    </div>
</div>
@include('includes.footer')
