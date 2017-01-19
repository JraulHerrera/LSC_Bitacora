@include('includes.header')
@section('title', 'home Alumno')
<br><br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-12"> 
                                <ul class="nav nav-tabs tabs tabs-top" style="width: 100%;">
                                    <li class="tab active" style="width: 33.3333%;">
                                        <a aria-expanded="true" class="active" id="urlalumnolaboratorio"> 
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
                                    <li class="tab" style="width: 33.3333%;"> 
                                        <a id="urlhistorialalumno" data-toggle="tab" aria-expanded="false" class=""> 
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
            
                                            @foreach($laboratorios as $lab)
                                        <a href="/getequipo/{{$lab->id}}">
                                            <div class="col-md-4">
                                                <div class="mini-stat clearfix card-box">
                                                   @if($lab->estado==0)
                                                    <span class="mini-stat-icon bg-primary"><i class="fa  fa-institution text-white"></i></span>
                                                    <div class="mini-stat-info text-right text-dark">
                                                        <span class="counter text-dark" data-plugin="counterup">Libre  <input type='radio' id='inlineRadio1' value='{{$lab->id}}' name='id_labo' checked=""></span>
                                                       
                                                    @else
                                                    <span class="mini-stat-icon bg-danger"><i class="fa  fa-institution text-white"></i></span>
                                                    <div class="mini-stat-info text-right text-dark">
                                                        <span class="counter text-dark" data-plugin="counterup">Ocupado</span>
                                                    @endif
                                                        
                                                        {{$lab->nombre}}
                                                    </div>
                                                    <div class="tiles-progress">
                                                        <div class="m-t-20">
                                                            <h5 class="text-uppercase"> 
                                                                @if($lab->estado==1)
                                                           @foreach($actividad as $act)
                                                                    @foreach($docentes as $docent)
                                                                    
                                                                        @if($lab->id==$act->id_laboratorio)
                                                                            @if($docent->n_plaza==$act->n_plaza)
                                                                                {{ $docent->nombre }}{{ $docent->apellidos }}
                                                                            @endif
                                                                        @endif
                                                                    
                                                                  @endforeach
                                                                @endforeach
                                                            @else
                                                            SIN PROFESOR
                                                            @endif
                                                            <span class="pull-right"></span></h5>
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
@include('includes.footer')
