<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <table>
     <tr>
      <td rowspan="2" colspan="1" align="right"><img src="assets/images/unach2.png"  width="20" height="60"></td>
      <td rowspan="1" colspan="2" align="center"><div style="margin-top: -12px;">Universidad Autónoma de Chiapas</div><br>Facultad de Contaduría y Administración, C-l</td>
      <td rowspan="2" colspan="2" align="left"><img src="assets/images/contaduria.png" width="20" height="60"></td>
    </tr>
     <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>                   
      <td colspan="5" style="text-align: right;">
        <h6><b>COORDINACIÓN ACADÉMICA DE LA LICENCIATURA<br> 
         EN SISTEMAS COMPUTACIONALES<br> 
         CENTRO DE COMPUTO</b>
        </h6>
      </td>
    </tr>

   <tr>                   
      <td colspan="6" align="center" style="background-color: #7a7777;">
        <h5><b>REPORTE DE ALUMNOS<!--BITÁCORA DE ACCESO AL LABORATORIO DE CÓMPUTO SALA B--><br> 
          {{$mes_inicio}} - {{$mes_fin}} {{$anno}}</b>
        </h5>
      </td>
    </tr>

      <tr>
            <td width="20" style="font-size:11px; text-align: center;"><h4>Carrera</h4></td>
            <td width="30" style="font-size:11px; text-align: center;"><h4>Nombre Completo</h4></td>
            <td width="10" style="font-size:11px; text-align: center;"><h4>Semestre</h4></td>
            <td width="8" style="font-size:11px; text-align: center;"><h4>Grupo</h4></td>
            <td width="10" style="font-size:11px; text-align: center;"><h4>Matricula</h4></td>
      </tr>
  </table>

    <table>
    @foreach($alumno as $alum)
      <tr>
        <td style="font-size:11px; text-align: center;">{{$alum->carrera}}</th>
        <td style="font-size:11px; text-align: center;" >{{$alum->nombre}} {{$alum->apellidos}}</th>
        <td style="font-size:11px; text-align: center;">{{$alum->semestre}}</th>
        <td style="font-size:11px; text-align: center;">{{$alum->grupo}}</th>
        <td style="font-size:11px; text-align: center;">{{$alum->matricula}}</th>     
      </tr>
    @endForeach
  </table>
</html>