<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <table>
     <tr>
      <td rowspan="2" align="right"><img src="assets/images/unach2.png"  width="20" height="60"></td>
      <td rowspan="1" align="center"><div style="margin-top: -12px;">Universidad Autónoma de Chiapas</div><br>Facultad de Contaduría y Administración, C-l</td>
      <td rowspan="2" align="left"><img src="assets/images/contaduria.png" width="20" height="60"></td>
    </tr>
     <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>                   
      <td colspan="2" style="text-align: right;">
        <h6><b>COORDINACIÓN ACADÉMICA DE LA LICENCIATURA<br> 
         EN SISTEMAS COMPUTACIONALES<br> 
         CENTRO DE COMPUTO</b>
        </h6>
      </td>
    </tr>

   <tr>                   
      <td colspan="3" align="center" style="background-color: #7a7777;">
        <h5><b>REPORTE DE LABORATORIOS<!--BITÁCORA DE ACCESO AL LABORATORIO DE CÓMPUTO SALA B--><br> 
          {{$mes_inicio}} - {{$mes_fin}} {{$anno}}</b>
        </h5>
      </td>
    </tr>

      <tr>
            <td width="20"><h4>Nombre</h4></td>
            <td width="50"><h4>Descripcion</h4></td>
            <td width="10"><h4>Laboratorio</h4></td>
      </tr>
  </table>

    <table>
    @foreach($laboratorios as $lab) 
      <tr>
          <td width="20"><h4>{{$lab->nombre}}</h4></td>
          <td width="50"><h4>{{$lab->descripcion}} <br>Fecha: {{$lab->created_at}}</h4></td>
           {{$t=""}}
          @foreach($equipos as $equipo)
            @if($equipo->id_laboratorio==$lab->id)
               {{$t++}}
            @endif
          @endForeach

          @if($t>0)
           <td width="10"><h4>{{$t}}</h4></td>
           @else
           <td width="10"><h4>0</h4></td>
          @endif
      </tr>
    @endForeach
  </table>
</html>