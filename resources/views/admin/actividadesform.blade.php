@include('includes.header')
@section('title', 'home Alumno')
<br><br><br><br>
<?php  
if(isset($actividades)) {
    $message='ACTUALIZAR'; 
    $id=$actividades->id;
    $label=$actividades->label;
    $description=$actividades->description;
}else{ 
    $message='NUEVO'; 
    $actividades=Null;
    $id=0;
    $label=$actividades;
    $description=$actividades;
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        {!!Form::open(['route'=>'actividades.store','method'=>'POST'])!!}
                <div class="panel panel-success panel-border">
                    <div class="panel-heading">
                         <h3 class="panel-title">{{ $message }} Actividad</h3>
                    </div>
                    <input type="hidden" name="id" value="{{$id}}">
                    <div class="panel-body">
                            <div class="form-group">
                            <label>NOMBRE DE LA ACTVIDAD</label>
                            <input type="text" name="label" class="form-control" placeholder="Ingresa Nombre " value="{{$label}}" required="required">
                        </div>
                         <div class="form-group">
                            <label >DESCRIPCION</label>
                            <input type="text" name="description" class="form-control" placeholder="Ingresa Descripción" value="{{$description}}" required="required">
                        </div>
                        <div class="form-group">
                        <div class="row text-right">
                            {!!Form::submit('Guardar',['class'=>'btn btn-primary waves-light'])!!}
                            {!! link_to('/actividades', 'Cancelar',array('class'=>'btn btn-danger')) !!}
                        </div>
                    </div>
                    </div>
                </div>
        {!!Form::close()!!}  
        </div>
    </div>
</div>
@include('includes.footer')