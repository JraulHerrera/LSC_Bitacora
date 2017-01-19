@include('includes.header')
@section('title', 'home Alumno')
<br><br><br><br>
<?php  
if(isset($laboratorios)) {
    $message='ACTUALIZAR'; 
    $id=$laboratorios->id;
    $nombre=$laboratorios->nombre;
    $descripcion=$laboratorios->descripcion;
}else{ 
    $message='NUEVO'; 
    $laboratorios=Null;
    $id=0;
    $nombre=$laboratorios;
    $descripcion=$laboratorios;
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        {!!Form::open(['route'=>'laboratorios.store','method'=>'POST'])!!}
                <div class="panel panel-success panel-border">
                    <div class="panel-heading">
                         <h3 class="panel-title">{{ $message }} LABORATORIO</h3>
                    </div>
                    <input type="hidden" name="id" value="{{$id}}">
                    <div class="panel-body">
                            <div class="form-group">
                            <label>NOMBRE DEL LABORATORIO</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Ingresa Nombre del Laboratorio" value="{{$nombre}}" required="required">
                        </div>
                         <div class="form-group">
                            <label >DESCRIPCION</label>
                            <input type="text" name="descripcion" class="form-control" placeholder="Ingresa Descripción" value="{{$descripcion}}" required="required">
                        </div>
                        <div class="form-group">
                        <div class="row text-right">
                            {!!Form::submit('Guardar',['class'=>'btn btn-primary waves-light'])!!}
                            {!! link_to('/laboratorio', 'Cancelar',array('class'=>'btn btn-danger')) !!}
                        </div>
                    </div>
                    </div>
                </div>
        {!!Form::close()!!}  
        </div>
    </div>
</div>
@include('includes.footer')