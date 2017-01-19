@include('includes.header')
@section('title', 'home Alumno')
<br><br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-12"> 
                                <ul class="nav nav-tabs tabs tabs-top" style="width: 100%;">
                                    <li class="tab " style="width: 33.3333%;">
                                        <a aria-expanded="true" class="" id="urlalumnolaboratorio"> 
                                            <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                            <span class="hidden-xs">LABORATORIOS</span> 
                                        </a> 
                                    </li>                                   
                                    <li class="tab " style="width: 33.3333%;"> 
                                        <a id="urlperfilalumno" data-toggle="tab" aria-expanded="false" class=""> 
                                            <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                            <span class="hidden-xs">PERFIL</span> 
                                        </a> 
                                    </li>
                                    <li class="tab active" style="width: 33.3333%;"> 
                                        <a id="urlhistorialalumno" data-toggle="tab" aria-expanded="true" class="active"> 
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
    <table id="datatable-buttons" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th >Fecha</th>
            <th>Hora Entrada</th>
            <th >Hora Salida</th>
            <th >Actividad </th>
        </tr>
    </thead>
    <tbody>
    @foreach($historial as $act) 
      <tr>
          <td >{{$act->fecha}}</td>
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
