@include('includes.header')
@section('title', 'home Alumno')
<br><br><br><br>
        <div class="container-fluid">
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
                                    <li class="tab" style="width: 20%;">
                                        <a href="/laboratorio" aria-expanded="true" class="" id="idLaboratorio"> 
                                            <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                            <span class="hidden-xs">LABORATORIOS </span> 
                                        </a> 
                                    </li>                                   
                                    <li class="tab" style="width: 20%;"> 
                                        <a id="urlEquipo" data-toggle="tab" aria-expanded="true" class=""> 
                                            <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
                                            <span class="hidden-xs">EQUIPOS</span> 
                                        </a> 
                                    </li>                                    
                                    <li class="tab active" style="width: 20%;"> 
                                        <a href="/reportes" data-toggle="tab" aria-expanded="true" id="idReportes" class="active"> 
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
    <div style="background-color: white; margin-left: 1px" class="row"> <br>
                                  {!!Form::open(['route'=>'reporte.store','method'=>'POST'])!!}
        <!-- ******************************************************************************-->
                                        <div class="row">
                                            <div class="col-md-1">
                                            &nbsp;
                                            </div>
                                            <div class="col-md-5">
                                             <div class="form-group">
                                                <label id="ciclo_inicio_l">Fecha inicio</label>
                                                <input type="date" name="ciclo_inicio" id="ciclo_inicio" class="form-control" id="fecha_inicio" required>
                                             </div>
                                            </div>
                                            <div class="col-md-5">
                                             <div class="form-group">
                                                <label id="ciclo_fin_l">Fecha fin</label>
                                                <input type="date" name="ciclo_fin" id="ciclo_fin" id="fecha_fin" class="form-control" required>
                                             </div>
                                            </div>
                                            <div class="col-md-1">
                                            &nbsp;
                                            </div>
                                        </div>
        <!-- ***********************************************************************-->
                                        <div class="row">
                                            <div class="col-md-1">
                                            &nbsp;
                                            </div>
                                            <div class="col-md-5">
                                             <div class="form-group">
                                                <label id="fecha_inicio_l">Fecha inicio</label>
                                                <input type="date" name="fecha_inicio" class="form-control" id="fecha_inicio" required>
                                             </div>
                                            </div>
                                            <div class="col-md-5">
                                             <div class="form-group">
                                                <label id="fecha_fin_l">Fecha fin</label>
                                                <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" required>
                                             </div>
                                            </div>
                                            <div class="col-md-1">
                                            &nbsp;
                                            </div>
                                        </div>

            <!-- ******************************************************************************-->
                                        <div class="row">
                                            <div class="col-md-1">
                                            &nbsp;
                                            </div>
                                            <div class="col-md-5">
                                             <div class="form-group">
                                                <label id="cmbLaboratorio_l">Laboratorio</label>
                                              {!!Form::select('id_laboratorio', \App\laboratorio_model::lists('nombre','id'),1,['class'=>'form-control select2','id'=>'cmbLaboratorio'] )!!}
                                             </div>
                                            </div>
                                            <div class="col-md-5">
                                             <div class="form-group">
                                                &nbsp;
                                             </div>
                                            </div>
                                            <div class="col-md-1">
                                            &nbsp;
                                            </div>
                                        </div>
        <!-- ***********************************************************************-->


                                        <div>
                                        <div class="col-md-1">
                                        &nbsp;
                                        </div>
                                        <div class="col-md-5">
                                             <div class="form-group">
                                                <label>Formato</label>
                                                <select class="form-control select2" tabindex="-1" aria-hidden="true" name="formato">
                                                    <option value="PDF">PDF</option>
                                                    <option value="EXCEL">EXCEL</option>
                                                </select>
                                            </div>
                                        </div>
                                         <div class="col-md-5">
                                             <div class="form-group">
                                                <label>Información</label>
                                                <select class="form-control select2" name="reporte" id="selectBox" onchange="changeFunc();">
                                                    <option value="LABORATORIOS">LABORATORIOS</option>
                                                    <option value="EQUIPOS">EQUIPOS</option>
                                                    <option value="ALUMNOS">ALUMNOS</option>
                                                    <option value="PROFESORES">PROFESORES</option>
                                                    <option value="ACT_ALUMNO">ACTIVIDADES ALUMNOS</option>
                                                    <option value="ACT_PROFESOR">ACTIVIDADES PROFESORES</option>
                                                </select>
                                            </div>
                                        </div>
                                         <div class="col-md-1">
                                        &nbsp;
                                        </div>
                                        </div>
                                        <div class="row">
                                         <div class="col-md-6">
                                        &nbsp;
                                        </div>
                                             <div class="col-md-4">
                                                 <div class="form-group">                      
                                                     {!!Form::submit('Descargar reporte',['class'=>'btn btn-primary glyphicon-cloud'])!!}
                                                 </div>
                                            </div>
                                         <div class="col-md-1">
                                        &nbsp;
                                        </div>
                                        </div>
                                         {!!Form::close()!!}  
                                    </div> 
   </div>




<script type="text/javascript">
  
    document.getElementById("idLaboratorio").onclick = function () {
        location.href = "/laboratorio";
    };

    document.getElementById("idReportes").onclick = function () {
        location.href = "/reportes";
    };

    function changeFunc() {
    var selectBox = document.getElementById("selectBox");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;

    if(selectedValue=="LABORATORIOS"){
       document.getElementById('ciclo_inicio_l').style.display = 'none';
       document.getElementById('ciclo_fin_l').style.display = 'none';
       document.getElementById('ciclo_inicio').style.display = 'none';
       document.getElementById('ciclo_fin').style.display = 'none';
       document.getElementById("ciclo_inicio").defaultValue = "2015-01-02";
       document.getElementById("ciclo_fin").defaultValue = "2015-01-02";

       document.getElementById('fecha_inicio_l').innerHTML = 'Inicio del ciclo';
       document.getElementById('fecha_fin_l').innerHTML = 'Fin del ciclo';
       document.getElementById('fecha_inicio_l').style.display = 'block';
       document.getElementById('fecha_fin_l').style.display = 'block';

       document.getElementById('fecha_inicio').style.display = 'block';
       document.getElementById('fecha_fin').style.display = 'block';
       document.getElementById('cmbLaboratorio').style.display = 'none';
       document.getElementById('cmbLaboratorio_l').style.display = 'none';
       document.getElementById('cmbLaboratorio').style.display = 'none';
       document.getElementById('cmbLaboratorio_l').style.display = 'none';
    }

    if(selectedValue=="EQUIPOS"){
       document.getElementById('fecha_inicio_l').innerHTML = 'Inicio del ciclo';
       document.getElementById('fecha_fin_l').innerHTML = 'Fin del ciclo';
       document.getElementById('fecha_inicio_l').style.display = 'block';
       document.getElementById('fecha_fin_l').style.display = 'block';

       document.getElementById('fecha_inicio_l').innerHTML = 'Fecha inicio';
       document.getElementById('fecha_fin_l').innerHTML = 'Fecha fin';
       document.getElementById('ciclo_inicio_l').innerHTML = 'Inicio del ciclo';
       document.getElementById('ciclo_fin_l').innerHTML = 'Fin del ciclo fin';

       document.getElementById('fecha_inicio').style.display = 'block';
       document.getElementById('fecha_fin').style.display = 'block';
       document.getElementById('cmbLaboratorio').style.display = 'none';
       document.getElementById('cmbLaboratorio_l').style.display = 'none';

       document.getElementById('ciclo_inicio_l').style.display = 'block';
       document.getElementById('ciclo_fin_l').style.display = 'block';
       document.getElementById('ciclo_inicio').style.display = 'block';
       document.getElementById('ciclo_fin').style.display = 'block';
       document.getElementById("ciclo_inicio").defaultValue = "00-00-00";
       document.getElementById("ciclo_fin").defaultValue = "00-00-00";
       document.getElementById('cmbLaboratorio').style.display = 'none';
       document.getElementById('cmbLaboratorio_l').style.display = 'none';
    }

    if(selectedValue=="ALUMNOS"){
       document.getElementById('fecha_inicio_l').innerHTML = 'Inicio del ciclo';
       document.getElementById('fecha_fin_l').innerHTML = 'Fin del ciclo';
       document.getElementById('fecha_inicio_l').style.display = 'block';
       document.getElementById('fecha_fin_l').style.display = 'block';

       document.getElementById('fecha_inicio_l').innerHTML = 'Fecha inicio';
       document.getElementById('fecha_fin_l').innerHTML = 'Fecha fin';
       document.getElementById('ciclo_inicio_l').innerHTML = 'Inicio del ciclo';
       document.getElementById('ciclo_fin_l').innerHTML = 'Fin del ciclo fin';

       document.getElementById('fecha_inicio').style.display = 'block';
       document.getElementById('fecha_fin').style.display = 'block';
       document.getElementById('cmbLaboratorio').style.display = 'none';
       document.getElementById('cmbLaboratorio_l').style.display = 'none';

       document.getElementById('ciclo_inicio_l').style.display = 'block';
       document.getElementById('ciclo_fin_l').style.display = 'block';
       document.getElementById('ciclo_inicio').style.display = 'block';
       document.getElementById('ciclo_fin').style.display = 'block';
       document.getElementById("ciclo_inicio").defaultValue = "00-00-00";
       document.getElementById("ciclo_fin").defaultValue = "00-00-00";
       document.getElementById('cmbLaboratorio').style.display = 'none';
       document.getElementById('cmbLaboratorio_l').style.display = 'none';
    }
    
    if(selectedValue=="PROFESORES"){
       document.getElementById('fecha_inicio_l').innerHTML = 'Inicio del ciclo';
       document.getElementById('fecha_fin_l').innerHTML = 'Fin del ciclo';
       document.getElementById('fecha_inicio_l').style.display = 'block';
       document.getElementById('fecha_fin_l').style.display = 'block';

       document.getElementById('fecha_inicio_l').innerHTML = 'Fecha inicio';
       document.getElementById('fecha_fin_l').innerHTML = 'Fecha fin';
       document.getElementById('ciclo_inicio_l').innerHTML = 'Inicio del ciclo';
       document.getElementById('ciclo_fin_l').innerHTML = 'Fin del ciclo fin';

       document.getElementById('fecha_inicio').style.display = 'block';
       document.getElementById('fecha_fin').style.display = 'block';
       document.getElementById('cmbLaboratorio').style.display = 'none';
       document.getElementById('cmbLaboratorio_l').style.display = 'none';

       document.getElementById('ciclo_inicio_l').style.display = 'block';
       document.getElementById('ciclo_fin_l').style.display = 'block';
       document.getElementById('ciclo_inicio').style.display = 'block';
       document.getElementById('ciclo_fin').style.display = 'block';
       document.getElementById("ciclo_inicio").defaultValue = "00-00-00";
       document.getElementById("ciclo_fin").defaultValue = "00-00-00";
       document.getElementById('cmbLaboratorio').style.display = 'none';
       document.getElementById('cmbLaboratorio_l').style.display = 'none';
    }
    if(selectedValue=="ACT_ALUMNO"){
       document.getElementById('fecha_inicio_l').innerHTML = 'Inicio del ciclo';
       document.getElementById('fecha_fin_l').innerHTML = 'Fin del ciclo';
       document.getElementById('fecha_inicio_l').style.display = 'block';
       document.getElementById('fecha_fin_l').style.display = 'block';

       document.getElementById('fecha_inicio_l').innerHTML = 'Fecha inicio';
       document.getElementById('fecha_fin_l').innerHTML = 'Fecha fin';
       document.getElementById('ciclo_inicio_l').innerHTML = 'Inicio del ciclo';
       document.getElementById('ciclo_fin_l').innerHTML = 'Fin del ciclo fin';

       document.getElementById('fecha_inicio').style.display = 'block';
       document.getElementById('fecha_fin').style.display = 'block';
       document.getElementById('cmbLaboratorio').style.display = 'none';
       document.getElementById('cmbLaboratorio_l').style.display = 'none';

       document.getElementById('ciclo_inicio_l').style.display = 'block';
       document.getElementById('ciclo_fin_l').style.display = 'block';
       document.getElementById('ciclo_inicio').style.display = 'block';
       document.getElementById('ciclo_fin').style.display = 'block';
       document.getElementById("ciclo_inicio").defaultValue = "00-00-00";
       document.getElementById("ciclo_fin").defaultValue = "00-00-00";
       document.getElementById('cmbLaboratorio').style.display = 'block';
       document.getElementById('cmbLaboratorio_l').style.display = 'block';
    }
    if(selectedValue=="ACT_PROFESOR"){
       document.getElementById('fecha_inicio_l').innerHTML = 'Inicio del ciclo';
       document.getElementById('fecha_fin_l').innerHTML = 'Fin del ciclo';
       document.getElementById('fecha_inicio_l').style.display = 'block';
       document.getElementById('fecha_fin_l').style.display = 'block';

       document.getElementById('fecha_inicio_l').innerHTML = 'Fecha inicio';
       document.getElementById('fecha_fin_l').innerHTML = 'Fecha fin';
       document.getElementById('ciclo_inicio_l').innerHTML = 'Inicio del ciclo';
       document.getElementById('ciclo_fin_l').innerHTML = 'Fin del ciclo fin';

       document.getElementById('fecha_inicio').style.display = 'block';
       document.getElementById('fecha_fin').style.display = 'block';
       document.getElementById('cmbLaboratorio').style.display = 'none';
       document.getElementById('cmbLaboratorio_l').style.display = 'none';

       document.getElementById('ciclo_inicio_l').style.display = 'block';
       document.getElementById('ciclo_fin_l').style.display = 'block';
       document.getElementById('ciclo_inicio').style.display = 'block';
       document.getElementById('ciclo_fin').style.display = 'block';
       document.getElementById("ciclo_inicio").defaultValue = "00-00-00";
       document.getElementById("ciclo_fin").defaultValue = "00-00-00";
       document.getElementById('cmbLaboratorio').style.display = 'block';
       document.getElementById('cmbLaboratorio_l').style.display = 'block';
    }
   }

    document.getElementById('fecha_inicio_l').innerHTML = 'Inicio del ciclo';
    document.getElementById('fecha_fin_l').innerHTML = 'Fin del ciclo';
    document.getElementById('fecha_inicio_l').style.display = 'block';
    document.getElementById('fecha_fin_l').style.display = 'block';

    document.getElementById('fecha_inicio').style.display = 'block';
    document.getElementById('fecha_fin').style.display = 'block';

    document.getElementById('ciclo_inicio_l').style.display = 'none';
    document.getElementById('ciclo_fin_l').style.display = 'none';
    document.getElementById('ciclo_inicio').style.display = 'none';
    document.getElementById('ciclo_fin').style.display = 'none';
   
    document.getElementById('cmbLaboratorio').style.display = 'none';
    document.getElementById('cmbLaboratorio_l').style.display = 'none';
    document.getElementById("ciclo_inicio").defaultValue = "2015-01-02";
    document.getElementById("ciclo_fin").defaultValue = "2015-01-02";
   
    
</script>
@include('includes.footer')
