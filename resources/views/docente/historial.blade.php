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
                <li class="tab " style="width: 33%;"> 
                    <a id="urlperfildocente" data-toggle="tab" aria-expanded="false" class=""> 
                        <span class="visible-xs"><i class="fa fa-user"></i></span> 
                        <span class="hidden-xs">PERFIL</span> 
                    </a> 
                </li> 
                <li class="tab active" style="width: 34%;"> 
                    <a id="urlhistorialdocente" data-toggle="tab" aria-expanded="true" class="active"> 
                        <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
                        <span class="hidden-xs">HISTORIAL</span> 
                    </a> 
                </li> 
                <div class="indicator" style="right: 394px; left: 0px;"></div>
            </ul>  
        </div>
    </div>
</div>
<div class="container">
    <div style="background-color: white;">
        <br>
        <div class="container"> <br>
            <table id="datatable-buttons" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora Entrada</th>
                        <th>Hora Salida</th>
                        <th>Semestre</th>
                        <th># Alumnos</th>
                        <th>Licenciatura</th>
                        <th>Actividad</th>
                        <th>Laboratorio</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($historial as $act) 
                  <tr>
                      <td>{{$act->fecha}}</td>
                      <td>{{$act->hora_entrada}}</td>
                      <td>{{$act->hora_salida}}</td>
                      <td>{{ $act->semestre }} {{ $act->grupo }}</td>
                      <td>{{ $act->n_alumnos }}</td>
                      <td>{{$act->carrera}}</td>
                      <td>{{$act->actividad}}</td>
                      <td>{{$act->labname}}</td>
                  </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('includes.footer')
