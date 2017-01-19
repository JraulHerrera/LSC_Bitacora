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
                                        <a href="/perfil" aria-expanded="true" class="active" id="idPerfil">
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
                                                    @endforeach

                                                  
                                                        
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div> 







                                    <div class="tab-pane" id="messages-21" style="display: none;">
                                        
                                    </div> 
                                    <div class="tab-pane" id="settings-21" style="display: none;">
                                        
                                    </div> 
                                </div> 
                </div>
            </div>
    </div> <!-- container -->




<div id="panel-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-full">
                                            <div class="modal-content p-0 b-0">
                                                <div class="panel panel-color panel-primary">
                                                    <div class="panel-heading"> 
                                                        <button type="button" class="close m-t-5" data-dismiss="modal" aria-hidden="true">×</button> 
                                                        <h3 class="panel-title">Equipos del laboratorio Uno</h3> 
                                                    </div> 
                                                    <div class="panel-body"> 
                                                       <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="widget-bg-color-icon card-box">
                                                                    <div class="bg-icon bg-icon-custom pull-left">
                                                                        <i class="ion-monitor text-custom"></i>
                                                                    </div>
                                                                    <div class="text-right">
                                                                        <h3 class="text-dark"><b data-plugin="counterup">No. 1</b></h3>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="widget-bg-color-icon card-box">
                                                                    <div class="bg-icon bg-icon-custom pull-left">
                                                                        <i class="ion-monitor text-custom"></i>
                                                                    </div>
                                                                    <div class="text-right">
                                                                        <h3 class="text-dark"><b data-plugin="counterup">No. 1</b></h3>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="widget-bg-color-icon card-box">
                                                                    <div class="bg-icon bg-icon-custom pull-left">
                                                                        <i class="ion-monitor text-custom"></i>
                                                                    </div>
                                                                    <div class="text-right">
                                                                        <h3 class="text-dark"><b data-plugin="counterup">No. 1</b></h3>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="widget-bg-color-icon card-box">
                                                                    <div class="bg-icon bg-icon-custom pull-left">
                                                                        <i class="ion-monitor text-custom"></i>
                                                                    </div>
                                                                    <div class="text-right">
                                                                        <h3 class="text-dark"><b data-plugin="counterup">No. 1</b></h3>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="widget-bg-color-icon card-box">
                                                                    <div class="bg-icon bg-icon-custom pull-left">
                                                                        <i class="ion-monitor text-custom"></i>
                                                                    </div>
                                                                    <div class="text-right">
                                                                        <h3 class="text-dark"><b data-plugin="counterup">No. 1</b></h3>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="widget-bg-color-icon card-box">
                                                                    <div class="bg-icon bg-icon-custom pull-left">
                                                                        <i class="ion-monitor text-custom"></i>
                                                                    </div>
                                                                    <div class="text-right">
                                                                        <h3 class="text-dark"><b data-plugin="counterup">No. 1</b></h3>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div>





<script type="text/javascript">
    document.getElementById("idPerfil").onclick = function () {
        location.href = "/perfil";
    };
</script>



@include('includes.footer')
