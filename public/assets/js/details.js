	 function labdetail(id){
	 	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	 	var route="detail/laboratorio/"+id;
		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': CSRF_TOKEN},
			type: 'GET',
			dataType: 'json',
			data:{idlab: id},
			success: function (response) {
			//console.log(response)   
				$('#namedocente').text(response.docentes.nombre +" "+response.docentes.apellidos);
				$('#labactividad').text(response.laboratorio.actividad);
				$('#labaCarrera').text(response.laboratorio.carrera);
				$('#urlstopdaminlab').attr('href','laboratorio/stopadmin/'+response.laboratorio.id);
				$('#horaentrada').text(response.laboratorio.hora_entrada);
				$('#labsemestre').text(response.laboratorio.semestre+" "+response.laboratorio.grupo);
				$('#detailModal').modal('show');
			},
			error:function(msj){
			}
		});
	}

	function labdetailalumno(id){
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	 	var route="detail/laboratorio/alumno/"+id;
		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': CSRF_TOKEN},
			type: 'GET',
			dataType: 'json',
			data:{idlab: id},
			success: function (response) {
			//console.log(response)   
				$('#namealumno').text(response.alumno.nombre +" "+response.alumno.apellidos);
				$('#labactividadalumno').text(response.equipos.actividad);
				$('#labaCarreraalumno').text(response.alumno.carrera);
				$('#matriculaalumno').text(response.alumno.matricula);
				$('#alumnoHora').text(response.equipos.hora_entrada);
				$('#labsemestrealumno').text(response.alumno.semestre+" "+response.alumno.grupo);
				$('#urlstopdamin').attr('href','equipo/stopadmin/'+response.equipos.id)
				$('#detailModalAlumno').modal('show');
			},
			error:function(msj){
			}
		});
	}

//document.oncontextmenu = function(){return false;} //bloqueal el boton derecho.

if(history.forward(1)){
history.replace(history.forward(1));
}