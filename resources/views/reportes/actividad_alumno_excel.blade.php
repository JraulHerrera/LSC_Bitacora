<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <table>
     <tr>
      <td rowspan="2" colspan="2" align="right"><img src="assets/images/unach2.png"  width="20" height="60"></td>
      <td rowspan="1" colspan="3" align="center"><div style="margin-top: -12px;">Universidad Autónoma de Chiapas</div><br>Facultad de Contaduría y Administración, C-l</td>
      <td rowspan="2" colspan="1" align="left"><img src="assets/images/contaduria.png" width="20" height="60"></td>
    </tr>
     <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>                   
      <td colspan="7" style="text-align: right;">
        <h6><b>COORDINACIÓN ACADÉMICA DE LA LICENCIATURA<br> 
         EN SISTEMAS COMPUTACIONALES<br> 
         CENTRO DE COMPUTO</b>
        </h6>
      </td>
    </tr>

   <tr>                   
      <td colspan="7" align="center" style="background-color: #7a7777;">
        <h5><b>BITÁCORA DE ACCESO AL LABORATORIO DE CÓMPUTO {{$nombreLab}}<br> 
          {{$mes_inicio}} - {{$mes_fin}} {{$anno}}</b>
        </h5>
      </td>
    </tr>

      <tr>
            <td width="10" style="font-size:11px; text-align: center;"><h4>Fecha</h4></td>
            <td width="12" style="font-size:11px; text-align: center;"><h4>Hora Entrada</h4></td>
            <td width="10" style="font-size:11px; text-align: center;"><h4>Hora Salida</h4></td>
            <td width="20" style="font-size:11px; text-align: center;"><h4>Nombre</h4></td>
            <td width="10" style="font-size:11px; text-align: center;"><h4>Matricula</h4></td>
            <td width="10" style="font-size:11px; text-align: center;"><h4>Carrera</h4></td>
            <td width="10" style="font-size:11px; text-align: center;"><h4>Actividad</h4></td>
      </tr>
  </table>

    <table>
    @foreach($actividades as $act) 
      <tr>
          <td style="text-align: center;">{{$act->fecha}}</td>
          <td style="text-align: center;">{{$act->hora_entrada}}</td>
          <td style="text-align: center;">{{$act->hora_salida}}</td>
           @foreach($alumnos as $alum)
            @if($alum->matricula==$act->matricula)
               <td style="text-align: center;">{{$alum->nombre}} {{$alum->apellidos}}</td>
               <td style="text-align: center;">{{$alum->matricula}}</td>
               <td style="text-align: center;">{{$alum->carrera}}</td>
               @break
            @endif
          @endForeach

          <td style="text-align: center;">{{$act->actividad}}</td>
      </tr>
      
    @endForeach
  </table>
</html>