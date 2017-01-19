@include('includes.header')
@section('title', 'home Alumno')
<?php
$fecha=date("Y-m-d");
?>
<br><br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-12"> 
                                <ul class="nav nav-tabs tabs tabs-top" style="width: 100%;">
                                    <li class="tab " style="width: 20%;">
                                        <a href="/laboratorio" aria-expanded="true" class="" id="idadminhistorialcompleto"> 
                                            <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                            <span class="hidden-xs">HISTORIAL ALUM.</span> 
                                        </a> 
                                    </li> 
                                     <li class="tab active" style="width: 20%;"> 
                                        <a id="histodocente" data-toggle="tab" aria-expanded="true" class="active"> 
                                            <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                            <span class="hidden-xs">HISTORIAL DOC.</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab " style="width: 20%;">
                                        <a href="/laboratorio" aria-expanded="false" class="" id="idLaboratorio"> 
                                            <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                            <span class="hidden-xs">LABORATORIOS</span> 
                                        </a> 
                                    </li>                                   
                                    <li class="tab" style="width: 20%;"> 
                                        <a href="/equipo" id="urlEquipo"> 
                                            <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
                                            <span class="hidden-xs">EQUIPOS</span> 
                                        </a> 
                                    </li>                                    
                                    <li class="tab" style="width: 20%;"> 
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
    <div class="container"> <br>
    {!!Form::open(['url'=>'/historial/administrador/docente/busqueda','method'=>'POST'])!!}
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label id="ciclo_inicio_l">Fecha inicio</label>
                    <input value="{{ $fecha }}" type="date" name="inicio" id="ciclo_inicio" class="form-control" id="fecha_inicio" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label id="ciclo_fin_l">Fecha fin</label>
                    <input value="{{ $fecha }}" type="date" name="fin" id="ciclo_fin" id="fecha_fin" class="form-control" required>
                </div>
            </div>
            <div class="col-md-1"><br>
                {!!Form::submit('Buscar',['class'=>'btn btn-primary waves-light'])!!} 
            </div>
        </div>
    {!!Form::close()!!}  
    <table id="datatable-buttons" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Docente</th>
                <th>Laboratorio</th>
                <th class="hidden-xs">Carrera</th>
                <th class="hidden-xs">Grupo</th>
                <th class="hidden-xs">Fecha</th>
                <th>Hora Entrada</th>
                <th >Hora Salida</th>
                <th >Actividad </th>
            </tr>
        </thead>
        <tbody>
        @foreach($historial as $act) 
            <tr>
                <td>{{ $act->nombre }} {{ $act->apellidos }}</td>
                <td>{{ $act->nombrelab }}</td>
                <td class="hidden-xs">{{ $act->carrera }}</td>
                <td class="hidden-xs">{{ $act->semestre }} {{ $act->grupo }}</td>
                <td class="hidden-xs">{{$act->fecha}}</td>
                <td >{{$act->hora_entrada}}</td>
                <td >{{$act->hora_salida}}</td>
                <td >{{$act->actividad}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="col-md-12 text-right">
        {{$historial ->render()}}
    </div>
</div>
</div>
@include('includes.footer')
