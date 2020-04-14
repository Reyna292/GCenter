var id_Estatus;
var id_jugqador;
var idJuego;
var id_Modal;
var id_form;


var titulo;
var fecha;
var hora;
var maxJug;
var premio;
var descripcion;

function obJugID(){
	id_jugador = document.getElementById("val-jugador").value;
}

function obJuego (){
	idJuego = document.getElementById("val-juego").value;
}

function odMod(){
	id_Modal = document.getElementById("val- ").value;

}

function odForm(){
	id_form = document.getElementById("val-forma").value;

}

function obEst(){
 	id_Estatus = document.getElementById("val-esta").value;
}

function guardarT(){
	titulo = document.getElementById("titulo").value;
	fecha =  document.getElementById("fecha").value;
	hora =  document.getElementById("hr").value;
	maxJug = document.getElementById("mjug").value;
	premio = document.getElementById("pre").value;
	descripcion = document.getElementById("desc").value;
	GuardarD();
}


function GuardarD(){
    console.log(" DATOOS " +titulo + " - " +fecha + " - " +hora + " - " +maxJug + " - " +premio + " - " +descripcion);
    $.ajax({
        url:'./GuardarTorneo.php',
        type: 'POST',
        dataType: 'html',
        data:{id_jugador: id_jugador, idJuego:idJuego, id_Modal:id_Modal, id_form:id_form, id_Estatus:id_Estatus, titulo: titulo, fecha:fecha, hora:hora, maxJug:maxJug, premio:premio, descripcion:descripcion},
    })
    .done(function (respuesta) {
    	console.log("ECHO ");
    })
    .fail(function () {
        console.log('error');
    })
}