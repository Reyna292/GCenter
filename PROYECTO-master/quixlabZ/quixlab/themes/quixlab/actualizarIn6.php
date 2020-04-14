<?php  
	
	 $link = new mysqli("localhost","admin","93ab9f73989e766a77c306ba3e6f7cb8d95309f36378ceed","revolution");
	 $salida = "";
	 
	if(isset($_POST['consulta'])){
		$q = $link->real_escape_string($_POST['consulta']);
		$sql = "SELECT id, titulo, (SELECT nombre FROM juegos WHERE id = id_juego) AS juegoN, fecha, hora, (SELECT nombre FROM modalidades WHERE id = id_modalidad) AS modalidad, max_jugadores, (SELECT nombre FROM formas WHERE id =  id_forma) AS forma, premios, descripcion, (SELECT nombre FROM estatus WHERE id = id_estatus) AS estatus, (SELECT nombre FROM gamers WHERE id = id_jugador_ganador) AS jugador FROM torneos WHERE  id = ".$q.";";
		
	}

	$resultado = $link -> query($sql);
	echo (mysqli_error ($link));

	if($resultado -> num_rows > 0){
		$salida.= " <div class='modal-body' id='formularioo'> "

                  
					  ;

                    while ($ver = $resultado -> fetch_assoc()) {
                    	$salida.=" 
                    <div class='form-group row'>
                        <label for='resultados' class='col-sm-2 col-form-label'>Nombre</label> 
                        <div class='col-sm-10'>
                            <input type='text' class='form-control form-control-sm' id='nom' value='".$ver['nombre']."'' ><br> 
                        </div>
                    </div>
                    <div class='form-group row'>
                        <label for='resultados' class='col-sm-2 col-form-label'>Apellidos</label>
                        <div class='col-sm-10'>
                             <input type='text' class='form-control form-control-sm'  id='ap' value='".$ver['apellidos']."''><br> 
                        </div>
                    </div>
                        <label for='resultados'>Fecha de nacimiento</label>
                        <input type='text'class='form-control form-control-sm' id='fn' value='".$ver['fecha_nacimiento']."''><br>
                           
                    <div class='form-group row'>
                        <label for='resultados' class='col-sm-2 col-form-label'>Genero</label>
                        <div class='col-sm-10'>
                            <input type='text' class='form-control form-control-sm'  id='gen' value='".$ver['genero']."''><br>
                        </div>
                    </div>    
                    <div class='form-group row'>
                       <label for='resultados' class='col-sm-2 col-form-label'>Telefono</label>
                        <div class='col-sm-10'>
                            <input type='text' class='form-control form-control-sm'  id='tel' value='".$ver['telefono']."''><br>
                        </div>
                    </div>    
                    <div class='form-group row'>
                       <label for='resultados' class='col-sm-2 col-form-label'>Correo</label>
                        <div class='col-sm-10'>
                            <input type='text' class='form-control form-control-sm'  id='cr' value='".$ver['correo']."''><br>
                        </div>
                    </div>
                    
                        ";
                    }
                    $salida.="
                     </div>
                    <div class='modal-footer'>
                        <button type='button' value='".$q."' onclick='guard(".$q.");' class='btn btn-primary btn-sm'>Guardar</button>
                    </div>"
                    ;
	} else {
		$salida.= "vacio";

	}
	
	echo $salida;
	$link -> close();
?>

