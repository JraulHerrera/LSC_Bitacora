<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reporte de laboratorios</title>
<style>
 
 .col-md-12 {
    width: 100%;
} 

.box {
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: 3px solid #ffffff;
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    background-color: #ffffff;
}

.box-header {
    color: #444;
    display: block;
    padding: 10px;
    position: relative;
}

.box-header.with-border {
    border-bottom: 1px solid #ffffff;
}


.box-header .box-title {
    display: inline-block;
    font-size: 18px;
    margin: 0;
    line-height: 1;
}

.box-body {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 10px;

}


.box-footer {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-top: 1px solid #ffffff;
    padding: 10px;
    background-color: #fff;
}


.table-bordered {
    border: 1px solid #ffffff;
}


.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}

table {
    background-color: transparent;
    border-spacing: 0;
    border-collapse: collapse;
}

 .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
    border: 1px solid #ffffff;
}


.badge {
    display: inline-block;
    min-width: 10px;
    padding: 3px 7px;
    font-size: 12px;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    background-color: #777;
    border-radius: 10px;
}

.bg-red {
    background-color: #dd4b39 !important;
}

#contenedor {width: 880px;height: 100%; margin-top:1em; border:2px solid; padding:1em;}
#col_der, #col_izq, #col_cen {height: 100%;}
#col_der {float: right; width: 10%;background-color: #f00;}
#col_izq {float: left; width: 20%;padding: 0,5em; background: #999;}
#col_cen {background-color: #ccc;}


</style>


</head>
<body>

<div class="col-md-12">
              <div class="box">
                <div class="box-body">
                  <table class="table table-bordered">
                  <thead>
                  <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                   <tr style="border-color: white;">
                    <td colspan="1" style="width: 40px; border-color: white; text-align: right;">
                      <img src="assets/images/unach.png" style="margin-top: 0px; margin-right: 0px; width: 80px; height: 70px;">
                    </td>
                    <td colspan="3" style="width: 60px; text-align:center; border-color: white;">
                      <h4><b><div style="margin-top: -12px;">Universidad Autónoma de Chiapas &nbsp;&nbsp;&nbsp;&nbsp;</div></b></h4>
                      <h5><b><div style="margin-top: -20px;">Facultad de Contaduría y Administración, C-l&nbsp;&nbsp;&nbsp;&nbsp;</div></b></h5>
                    </td>
                    <td colspan="1" style="width: 40px; border-color: white;">
                       <img src="assets/images/contaduria.png" style="margin-top: 0px; width: 80px; height: 70px;">
                    </td>
                  </tr>
                  <tr style="">                                     
                    <td colspan="5">
                     <h6><div style="text-align: right; margin-top: -20px"><b>COORDINACIÓN ACADÉMICA DE LA LICENCIATURA<br> 
                     EN SISTEMAS COMPUTACIONALES<br> CENTRO DE COMPUTO</b>
                     </div></h6>
                    </td>
                    <td>
                      &nbsp;
                    </td>
                  </tr>


                  <tr style="border:0px; margin-bottom: 6px;">                   
                    <th colspan="6" style="width: 250px;">
                     <h5><div style="text-align: center; margin-top: -20px; margin-bottom: 0px; background-color: rgb(166,166,166);"><b>REPORTE DE ALUMNOS<!--BITÁCORA DE ACCESO AL LABORATORIO DE CÓMPUTO SALA B--><br> 
                     {{$mes_inicio}} - {{$mes_fin}} {{$anno}}</b>
                     </div></h5>
                    </th>
                  </tr>

                  <tr>
                      <th style="width: 50px; background-color: rgba(120,120,120,0.9); text-align: center; font-size:13px; border-style: solid; border-color: #000000 #000000;">Carrera</th>
                      <th style="width: 50px; background-color: rgba(120,120,120,0.9); font-size:13px; border-style: solid; border-color: #000000 #000000;">Semestre</th>
                      <th style="width: 50px; background-color: rgba(120,120,120,0.9); text-align: center; font-size:13px; border-style: solid; border-color: #000000 #000000;">Grupo</th>
                      <th style="width: 50px; background-color: rgba(120,120,120,0.9); text-align: center; font-size:13px; border-style: solid; border-color: #000000 #000000;">Apellidos</th>
                      <th style="width: 50px; background-color: rgba(120,120,120,0.9); font-size:13px; border-style: solid; border-color: #000000 #000000;">Nombre</th>
                      <th style="width: 50px; background-color: rgba(120,120,120,0.9); text-align: center; font-size:13px; border-style: solid; border-color: #000000 #000000;">Matricula</th>
                  </tr>
                  </thead>
                  <tbody>

    <tbody>
    @foreach($alumno as $alum)
      <tr>
        <th style="font-size:11px; border-style: solid; border-color: #000000 #000000;">{{$alum->carrera}}</th>
        <th style="font-size:11px; border-style: solid; border-color: #000000 #000000;">{{$alum->semestre}}</th>
        <th style="font-size:11px; border-style: solid; border-color: #000000 #000000;">{{$alum->grupo}}</th>
        <th style="font-size:11px; border-style: solid; border-color: #000000 #000000;">{{$alum->apellidos}}</th>
        <th style="font-size:11px; border-style: solid; border-color: #000000 #000000;">{{$alum->nombre}}</th>
        <th style="font-size:11px; border-style: solid; border-color: #000000 #000000;">{{$alum->matricula}}</th>     
      </tr>
    @endForeach
     </tbody>
                    
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  
                </div>
              </div><!-- /.box -->

              
            </div>


  
</body>
</html>