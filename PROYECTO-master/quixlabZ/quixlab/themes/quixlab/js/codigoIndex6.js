$(buscar());
function buscar(consulta){
	$.ajax({
		url:'./indexx6.php',
		type: 'POST',
		dataType: 'html',
		data:{consulta: consulta},
	})
	.done(function (respuesta) {
		$("#llenar").html(respuesta);
	})
	.fail(function () {
		console.log('error');
	})
}


function eliminar(consulta){
	$.ajax({
		url:'./eliminarTorneo.php',
		type: 'POST',
		dataType: 'html',
		data:{consulta: consulta},
	})
}


$(document).on('keyup','#busqueda', function(){
	var valor = $(this).val();
	if(valor != " "){
		buscar(valor);
	}else{
		buscar();
	}
})

$(document).on('onclick','#eliminar', function(){	
	var v = $(this).val();
	console.log("entro "+v);
	if(v != " "){
		eliminar(v);
	}else{
		eliminar();
	}
})


function preg(value) {
	var v = value;
	console.log("entro "+v);
	if(v != " "){
		eliminar(v);
		buscar();
	}else{
		eliminar();
	}
}

function act(value){
	var va = value;
	console.log("valor act"+va);
	if(va != " "){
		actualizar(va);
	}else{
		actualizar();
	}
}
