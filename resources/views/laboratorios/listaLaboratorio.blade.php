 @include('includes.header')
@section('title', 'home Alumno')
<br><br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-12"> 
                                <ul class="nav nav-tabs tabs tabs-top" style="width: 100%;">
                                     <li class="tab" style="width: 20%;">
                                        <a href="/laboratorio" aria-expanded="false" class="" id="idadminhistorialcompleto"> 
                                            <span class="visible-xs"><i class="md md-people-outline"></i></span> 
                                            <span class="hidden-xs">HISTORIAL ALUM.</span> 
                                        </a> 
                                    </li>
                                    <li class="tab " style="width: 20%;"> 
                                        <a id="histodocente" data-toggle="tab" aria-expanded="true" class=""> 
                                            <span class="visible-xs"><i class="md md-people"></i></span> 
                                            <span class="hidden-xs">HISTORIAL DOC.</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab active" style="width: 20%;">
                                        <a href="/laboratorio" aria-expanded="true" class="active" id="idLaboratorio"> 
                                            <span class="visible-xs"><i class="md md-business"></i></span> 
                                            <span class="hidden-xs">LABORATORIOS</span> 
                                        </a> 
                                    </li>                                   
                                    <li class="tab" style="width: 20%;"> 
                                        <a href="/equipo" id="urlEquipo"> 
                                            <span class="visible-xs"><i class="md md-computer"></i></span> 
                                            <span class="hidden-xs">EQUIPOS</span> 
                                        </a> 
                                    </li>                                    
                                    <li class="tab" style="width: 20%;"> 
                                        <a id="idReportes" data-toggle="tab" aria-expanded="false" class=""> 
                                            <span class="visible-xs"><i class="md md-trending-up"></i></span> 
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
        <div class="container">
        <div class="col-md-6">
            <label>Listado de Laboratorios</label>
        </div>
        <div class="col-md-6 text-right">
            <a href="laboratorio/nuevo" class="btn btn-primary">NUEVO</a>
        </div> 
        </div>
       
        <div class="container"> <br>
        <table id="datatable-buttons" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th class="hidden-xs">Descripción</th>
                    <th>Estado</th>
                    <th colspan="3">Acción</th>
                 </tr>
            </thead>
            <tbody>
                @foreach($laboratorios as $lab)
                    <tr>
                        <td>{{$lab->nombre }} </td>
                        <td class="hidden-xs">{{$lab->descripcion }} </td>
                         @if($lab->estado==0)
                            <td class="text-center">
                                <span class="label label-table label-success">Libre</span>
                            </td>
                        @else
                            <td class="text-center">
                            <span class="label label-table label-danger">Ocupado</span>
                            </td>
                        @endif
                        @if($lab->estado==0)
                           <td class="text-center"></td>
                        @else
                           <td class="text-center"><a href="#" onclick="labdetail('{{ $lab->id}}')">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a></td>
                        @endif
                        
                        <td class="text-center">
                            {!!link_to('laboratorios/edit/'.$lab->id, '',array('class'=>'fa fa-pencil-square-o','style'=>'color:rgb(121,121,121);')) !!}
                        </td>
                        <td> 
                            {!!link_to('laboratorios/laboratoriodel/'.$lab->id, '',array('class'=>'fa fa-ban','style'=>'color:rgb(121,121,121);')) !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="detailModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detalle del Laboratorio &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hora de entrada: <span id="horaentrada"></span></h4>
      </div>
      <div class="modal-body">
      <div class="row">
      <div class="col-md-6">
        <h4 class="modal-title"><b>Docente:</b></h4>
        <h5 id="namedocente"></h5>  
      </div>
      <div class="col-md-6">
          <h4 class="modal-title"><b>Actividad:</b></h4>
        <h5 id="labactividad"></h5>
      </div>
      <div class="col-md-6">
        <h4 class="modal-title"><b>Carrera:</b></h4>
        <h5 id="labaCarrera"></h5>
      </div>
      <div class="col-md-6">
            <h4 class="modal-title"><b>Semestre:</b></h4>
          <h5 id="labsemestre"></h5>
      </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="" id="urlstopdaminlab" class="btn btn-danger">Detener</a>&nbsp;
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

@include('includes.footer')