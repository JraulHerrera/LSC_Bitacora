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
        <h5><b>REPORTE DE EQUIPOS<!--BITÁCORA DE ACCESO AL LABORATORIO DE CÓMPUTO SALA B--><br> 
          {{$mes_inicio}} - {{$mes_fin}} {{$anno}}</b>
        </h5>
      </td>
    </tr>

      <tr>
            <td width="20"><h4>Nombre</h4></td>
            <td width="50"><h4>Descripcion</h4></td>
            <td width="10"><h4>Total de equipos</h4></td>
      </tr>
  </table>

    <table>
    @foreach($equipos as $equipo)
    <tr>
          <th style="font-size: 11px; text-align: center;">{{$equipo->nombre}}</th>
          <th style="font-size: 11pxpx; text-align: left;">Descripcion: {{$equipo->descripcion}}<br>
              Num. Equipo: {{$equipo->n_equipo}}<br>
              S.O.: {{$equipo->so}}<br>
              Marca: {{$equipo->marca}}<br>
              Modelo: {{$equipo->modelo}}<br>
              Disco duro: {{$equipo->disco_duro}}<br>
              Procesador: {{$equipo->procesador}}<br>
              Monitor: {{$equipo->monitor}}<br>
              Num. Inventario: {{$equipo->num_inventario}}<br>
              Mouse: {{$equipo->mouse}}<br>
              Teclado: {{$equipo->teclado}}<br>
              Tarjeta madre: {{$equipo->mother_board}}<br>
              Memoria ram: {{$equipo->memoria_ram}}<br>
              Controladores: {{$equipo->controladores}}<br>
              Fuente de poder: {{$equipo->fuente}}<br>
              Otros: {{$equipo->variedad}}<br>
          </th>
          
           
          @foreach($laboratorios as $lab)
            @if($equipo->id_laboratorio==$lab->id)
                <th style="font-size: 11px; text-align: center;">{{$lab->nombre}} </th>
            @endif
          @endForeach

     </tr>
    @endForeach
  </table>
</html>





