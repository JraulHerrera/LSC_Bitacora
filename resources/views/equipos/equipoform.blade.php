@include('includes.header')
@section('title', 'Bitacora')
<br><br><br><br>
<?php  
if(isset($equipos)) {
    $id=$equipos->id;
    $nombre=$equipos->nombre;
    $id_laboratorio=$equipos->id_laboratorio;
    $descripcion=$equipos->descripcion;
    $n_equipo=$equipos->n_equipo;
    $so=$equipos->so;
    $marca=$equipos->marca;
    $disco_duro=$equipos->disco_duro;
    $procesador=$equipos->procesador;
    $modelo=$equipos->modelo;
    $mouse=$equipos->mouse;
    $num_inventario=$equipos->num_inventario;
    $monitor=$equipos->monitor;
    $memoria_ram=$equipos->memoria_ram;
    $mother_board=$equipos->mother_board;
    $teclado=$equipos->teclado;
}else{ $message='New'; 
    $equipos=Null;
    $id=0;
    $nombre=$equipos;
    $descripcion=$equipos;
    $n_equipo=$equipos;
     $id_laboratorio=$equipos;
    $so=$equipos;
    $marca=$equipos;
    $disco_duro=$equipos;
    $procesador=$equipos;
    $modelo=$equipos;
    $mouse=$equipos;
    $num_inventario=$equipos;
    $monitor=$equipos;
    $memoria_ram=$equipos;
    $mother_board=$equipos;
    $teclado=$equipos;

}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
        {!!Form::open(['route'=>'equipos.store','method'=>'POST'])!!}
                <div class="panel panel-success panel-border">
                    <div class="panel-heading">
                    <div class="col-md-8">
                         <h3 class="panel-title">NUEVO EQUIPO</h3>
                    </div>
                    <div class="col-md-4 text-right">
                          {!!Form::submit('GUARDAR',['class'=>'btn btn-primary waves-light'])!!}
                              <a href="/equipo" class="btn btn-danger">Regresar</a>

                    </div>
                    </div>
                    <input type="hidden" name="id" value="{{$id}}">
                    <div class="panel-body">
                    <br>
                    <div class="col-lg-6">
                                <div class="portlet">
                                    <div class="portlet-heading bg-success">
                                        <h3 class="portlet-title">
                                            Datos
                                        </h3>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion1" href="#bg-success" class="" aria-expanded="true"><i class="ion-minus-round"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="bg-success" class="panel-collapse collapse in" aria-expanded="true">
                                        <div class="portlet-body" style="background: #f4f8fb;">
                                            <div class="form-group">
                                                {!!Form::label('Laboratorio','Laboratorio')!!}
                                                {!!Form::select('id_laboratorio', \App\laboratorio_model::lists('nombre','id'),$id_laboratorio,['class'=>'form-control select2'] )!!}
                                            </div>
                                            <div class="form-group">
                                                <label>Nombre del Equipo</label>
                                                <input type="text" name="nombre" class="form-control" placeholder="Ingresa Nombre del Equipo" value="{{$nombre}}" required="required">
                                            </div>
                                             <div class="form-group">
                                              <label>Numero de Equipo</label>
                                                <input type="text" name="n_equipo" class="form-control" placeholder="Ingresa Numero del Equipo" value="{{$n_equipo}}" required="required">  
                                            </div>
                                             <div class="form-group">
                                                <label >Descripción</label>
                                                <input type="text" name="descripcion" class="form-control" placeholder="Ingrese Descripción" value="{{$descripcion}}">
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="col-lg-6">
                                <div class="portlet">
                                    <div class="portlet-heading bg-success">
                                        <h3 class="portlet-title">
                                            Datos
                                        </h3>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion1" href="#bg-success2" class="" aria-expanded="true"><i class="ion-minus-round"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="bg-success2" class="panel-collapse collapse in" aria-expanded="true">
                                        <div class="portlet-body" style="background: #f4f8fb;">
                                            <div class="form-group">
                                                <label>Sistema Operativo</label>
                                                <input type="text" name="so" required="required" class="form-control" placeholder="Ingresa Sistema Operativo" value="{{$so}}">
                                            </div>
                                             <div class="form-group">
                                                <label >Memoria RAM</label>
                                                <input type="text" name="memoria_ram" class="form-control" placeholder="Ingrese Memoria RAM" value="{{$memoria_ram}}">
                                            </div> 
                                             <div class="form-group">
                                                <label >Marca</label>
                                                <input type="text" name="marca" class="form-control" placeholder="Ingrese Marca" value="{{$marca}}">
                                            </div> 
                                             <div class="form-group">
                                                <label >Procesador</label>
                                                <input type="text" name="procesador" class="form-control" placeholder="Ingrese procesador" value="{{$procesador}}">
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                          <div class="col-lg-6">
                                <div class="portlet">
                                    <div class="portlet-heading bg-success">
                                        <h3 class="portlet-title">
                                            Datos
                                        </h3>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion1" href="#bg-success3" class="" aria-expanded="true"><i class="ion-minus-round"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="bg-success3" class="panel-collapse collapse in" aria-expanded="true">
                                        <div class="portlet-body" style="background: #f4f8fb;">
                                            <div class="form-group">
                                              <label>Monitor de Equipo</label>
                                                <input type="text" name="monitor" class="form-control" placeholder="Ingresa Monitor del Equipo" value="{{$monitor}}">  
                                            </div>
                                            <div class="form-group">
                                                <label>Numero de Inventario</label>
                                                <input type="text" name="num_inventario" class="form-control" placeholder="Ingresa Numero de Inventario" value="{{$num_inventario}}">
                                            </div>
                                             <div class="form-group">
                                                <label >Mouse</label>
                                                <input type="text" name="mouse" class="form-control" placeholder="Ingrese Mouse" value="{{$mouse}}">
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                          <div class="col-lg-6">
                                <div class="portlet">
                                    <div class="portlet-heading bg-success">
                                        <h3 class="portlet-title">
                                            Datos
                                        </h3>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion1" href="#bg-success4" class="" aria-expanded="true"><i class="ion-minus-round"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="bg-success4" class="panel-collapse collapse in" aria-expanded="true">
                                        <div class="portlet-body" style="background: #f4f8fb;">
                                            <div class="form-group">
                              <label>Tarjeta Madre</label>
                                <input type="text" name="mother_board" class="form-control" placeholder="Ingresa Tarjeta Madre" value="{{$mother_board}}">  
                            </div>
                            <div class="form-group">
                                <label>Teclado</label>
                                <input type="text" name="teclado" class="form-control" placeholder="Ingresa Teclado" value="{{$teclado}}">
                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        
                        
                        <div class="form-group">
                        <div class="row text-right">
                        <div class="col-md-12">
                           
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
        {!!Form::close()!!}  
        </div>
    </div>
</div>
@include('includes.footer')