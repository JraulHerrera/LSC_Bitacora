 @include('includes.header')
@section('title', 'home Alumno')
<?php
if(isset($id_laboratorio)){
    $id_laboratorio=$id_laboratorio;
}else{
    $id_laboratorio=null;
}
?>
<br><br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-12"> 
                    <ul class="nav nav-tabs tabs tabs-top" style="width: 100%;">
                                    <li class="tab" style="width: 20%;">
                                        <a href="/laboratorio" aria-expanded="false" class="" id="idadminhistorialcompleto"> 
                                            <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                            <span class="hidden-xs">HISTORIAL ALUM.</span> 
                                        </a> 
                                    </li>
                                    <li class="tab " style="width: 20%;"> 
                                        <a id="histodocente" data-toggle="tab" aria-expanded="true" class=""> 
                                            <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                            <span class="hidden-xs">HISTORIAL DOC.</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab " style="width: 20%;">
                                        <a href="/laboratorio" aria-expanded="true" class="" id="idLaboratorio"> 
                                            <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                            <span class="hidden-xs">LABORATORIOS </span> 
                                        </a> 
                                    </li>                                   
                                    <li class="tab active" style="width: 20%;"> 
                                        <a href="/equipo" id="urlEquipo" data-toggle="tab" aria-expanded="false" class="active"> 
                                            <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
                                            <span class="hidden-xs">EQUIPOS</span> 
                                        </a> 
                                    </li>                                    
                                    <li class="tab" style="width: 20%;"> 
                                        <a href="#reportes-21" data-toggle="tab" aria-expanded="false" class="" id="idReportes"> 
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
    <div style="background-color: white;"><br>
        <div class="col-md-12">
            {!!Form::open(['url'=>'/equipo/busqueda','method'=>'POST'])!!}
                <div class="col-md-1">
                <div class="form-group"><p></p>
                    {!!Form::label('Laboratorios','Laboratorios')!!}
                </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {!!Form::select('id_laboratorio', \App\laboratorio_model::lists('nombre','id'),$id_laboratorio,['class'=>'form-control select2'] )!!}
                    </div>
                </div>
                <div class="col-md-2">
                    
                    {!!Form::submit('Buscar',['class'=>'btn btn-primary waves-light'])!!} 
                </div> 
            {!!Form::close()!!} 
            <div class="col-md-5 text-right">
                <a href="/equipo/nuevo" class="btn btn-primary">NUEVO</a>
            </div> 
        </div>
        <div class="container">
        <table id="datatable-buttons" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Laboratorio</th>
                    <th class="hidden-xs">Descripción</th>
                    <th class="hidden-xs">S.O</th>
                    <th class="hidden-xs">Marca</th>
                    <th>Estatus</th>
                    <th colspan="3">Acción</th>
                 </tr>
            </thead>
            <tbody>
            @if(isset($equipos))
                @foreach($equipos as $eq)
                    <tr>
                        <td>{{$eq->nombre }} </td>
                        <td>{{$eq->name }} </td>
                        <td class="hidden-xs">{{$eq->descripcion }} </td>
                        <td class="hidden-xs">{{ $eq->so }}</td>
                        <td class="hidden-xs">{{ $eq->marca }}</td>
                        <td class="text-center">
                            @if($eq->estado==0)
                                <span class="label label-table label-success">Libre</span>
                            @else
                                <span class="label label-table label-danger">Ocupado</span>
                            @endif
                        </td>
                        @if($eq->estado==0)
                           <td class="text-center"></td>
                        @else
                           <td class="text-center"><a href="#" onclick="labdetailalumno('{{ $eq->id}}')">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a></td>
                        @endif
                        <td class="text-right">
                            {!!link_to('equipos/edit/'.$eq->id, '',array('class'=>'fa fa-pencil-square-o','style'=>'color:rgb(121,121,121);')) !!}
                        </td>
                        <td> 
                            {!!link_to('equipos/equiposdel/'.$eq->id, '',array('class'=>'fa fa-ban','style'=>'color:rgb(121,121,121);')) !!}
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
         {{$equipos ->render()}}

        </div>                  
    </div>
</div>

<!-- Modal -->
<div id="detailModalAlumno" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detalle del Equipo &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hora de entrada: <span id="alumnoHora"></span></h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <h4 class="modal-title"><b>Alumno:</b></h4>
                <h5 id="namealumno"></h5>  
            </div>
            <div class="col-md-6">
                <h4 class="modal-title"><b>Actividad:</b></h4>
                <h5 id="labactividadalumno"></h5>
            </div>
            <div class="col-md-6">
                <h4 class="modal-title"><b>Carrera:</b></h4>
                <h5 id="labaCarreraalumno"></h5>
            </div>
            <div class="col-md-6">
                <h4 class="modal-title"><b>Semestre:</b></h4>
                <h5 id="labsemestrealumno"></h5>
            </div>
            <div class="col-md-6">
                <h4 class="modal-title"><b>Matrícula:</b></h4>
                <h5 id="matriculaalumno"></h5>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="" id="urlstopdamin" class="btn btn-danger">Detener</a>&nbsp;
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
@include('includes.footer')