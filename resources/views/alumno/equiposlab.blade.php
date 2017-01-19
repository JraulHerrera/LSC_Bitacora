@include('includes.header')
@section('title', 'home Alumno')
<br><br><br><br>
<div class="container">
<div class="panel panel-color panel-primary">
    <div class="panel-heading"> 
    <div class="row">
        <div class="col-md-10">
             <h3 class="panel-title">Equipos</h3> 
        </div>
        <div class="col-md-1">
                        <a href="/laboratorioalumno" class="btn btn-danger">regresar</a>
        </div>
        <div class="col-md-1">
            @if(isset($session))
             {!!Form::open(['action'=>'equipos_controller@stopsession','method'=>'POST'])!!}
                <input type="hidden" name="idlab" value="{{$idlab}}">
                <input type="hidden" name="idalum" value="{{ Auth::user()->idUsuario }}">
                {!!Form::submit('Detener',['class'=>'btn btn-danger waves-light'])!!}
             {!!Form::close()!!}  
            @endif
        </div>
    </div>
       
    </div> 
    <div class="panel-body"> 
     @if(!isset($session))
     {!!Form::open(['action'=>'equipos_controller@signlapb','method'=>'POST'])!!}
        <div class="row">
            <div class="col-md-8">
                
            <input type="hidden" name="idlab" value="{{$idlab}}">

            <input type="hidden" name="idalum" value="{{ Auth::user()->idUsuario }}">
            <input type="hidden" name="type" value="{{ Auth::user()->tipo }}">
            @if($equipos!=null)
            <div class="form-group">
                {!!Form::label('Actividad','Actividad')!!}
                {!!Form::select('actividad', \App\activiti::lists('label','label'),'',['class'=>'form-control select2', 'required'=>'required'] )!!}
            </div>
            </div>
            <div class="form-group"><p>&nbsp;</p>
                 {!!Form::submit('Iniciar',['class'=>'btn btn-primary waves-light'])!!}
            </div>
            @else
                <div class="text-center">
                    <h1> No existen equipos asignados a este laboratorio aún.</h1>
                </div>
            @endif

        </div>
        <div class="row">
        @foreach($equipos as $lab)
        <?php
            if($lab->estado==1)
            {
                $status="danger";
            }else{
                $status="succes";
            }
        ?>
            <div class="col-md-2">
                <div class="widget-bg-color-icon card-box ">
                    <div class="sm-icon bg-icon-{{$status}} pull-left ">
                        <i class="ion-monitor text-custom"></i>
                    </div>
                    <div class="text-right">
                        <h5 class="text-dark"><b>Equipo{{ $lab->n_equipo }}</b>&nbsp;&nbsp;&nbsp; 
                        <?php
                            if($lab->estado==1)
                            {
                                
                            }else{
                                echo "
                                <input type='radio' id='inlineRadio1' value='".$lab->id."' name='id_equipo' checked=''>
                                ";
                               
                            }
                        ?>
                        </h5>
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
            </div>
        @endforeach
        </div>
         {!!Form::close()!!}  
        
    @else
    <div class="text-center">
        <h1>Tienes iniciado sessión en un Equipo</h1>
        <h3><b>LABORATORIO: </b>{{ $session->labname }}</h3>
        <h3><b>EQUIPO: </b>{{ $session->name }}</h3>
    </div>
    @endif


    </div> 
</div>
</div>
@include('includes.footer')
