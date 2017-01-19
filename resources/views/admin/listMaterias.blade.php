 @include('includes.header')
@section('title', 'home Alumno')
<br><br><br><br>
        <div class="container">
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
                                        <a href="/laboratorio" aria-expanded="true" class="" id="idLaboratorio"> 
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
        <div class="container">
        <div class="col-md-6">
            <label>Listado de actividades</label>
        </div>
        <div class="col-md-6 text-right">
            <a href="actividad/nueva" class="btn btn-primary">NUEVO</a>
        </div> 
        </div>
       
        <div class="container"> <br>
        <table id="datatable-buttons" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th colspan="2">Acción</th>
                 </tr>
            </thead>
            <tbody>
                @foreach($actividades as $lab)
                    <tr>
                        <td>{{$lab->label }} </td>
                        <td>{{$lab->description }} </td>
                        <td class="text-center">
                            {!!link_to('actividad/edit/'.$lab->id, '',array('class'=>'fa fa-pencil-square-o','style'=>'color:rgb(121,121,121);')) !!}
                        </td>
                        <td> 
                            {!!link_to('actividad/actividaddel/'.$lab->id, '',array('class'=>'fa fa-ban','style'=>'color:rgb(121,121,121);')) !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@include('includes.footer')