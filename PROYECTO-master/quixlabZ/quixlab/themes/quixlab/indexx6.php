<?php  
	
	 $link = new mysqli("localhost","admin","93ab9f73989e766a77c306ba3e6f7cb8d95309f36378ceed","revolution");
	 $salida = "";
	 $sql = "SELECT id, titulo, (SELECT nombre FROM juegos WHERE id = id_juego) AS juegoN, fecha, hora, (SELECT nombre FROM modalidades WHERE id = id_modalidad) AS modalidad, max_jugadores, (SELECT nombre FROM formas WHERE id =  id_forma) AS forma, premios, descripcion, (SELECT nombre FROM estatus WHERE id = id_estatus) AS estatus, (SELECT nombre FROM gamers WHERE id = id_jugador_ganador) AS jugador FROM torneos";

	if(isset($_POST['consulta'])){
		$q = $link->real_escape_string($_POST['consulta']);
		$sql = "SELECT id, titulo, (SELECT nombre FROM juegos WHERE id = id_juego) AS juegoN, fecha, hora, (SELECT nombre FROM modalidades WHERE id = id_modalidad) AS modalidad, max_jugadores, (SELECT nombre FROM formas WHERE id =  id_forma) AS forma, premios, descripcion, (SELECT nombre FROM estatus WHERE id = id_estatus) AS estatus, (SELECT nombre FROM gamers WHERE id = id_jugador_ganador) AS jugador FROM torneos WHERE titulo LIKE '%".$q."%'";
		
	}

	$resultado = $link -> query($sql);
	echo (mysqli_error ($link));

	if($resultado -> num_rows > 0){
		$salida.= "<table class='table table-xs mb-0'>
					 <thead>
					 	<tr>
                            <th>Titulo</th>
                            <th>Juego</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Modalidad</th>
                            <th>Maximo de Jugadores</th>
                            <th>Forma</th>
                            <th>Premios</th>
                            <th>Descripción</th>
                            <th>Estatus</th>
                            <th>Ganador</th>


                        </tr>
                    </thead>
                    <tbody>";

                    while ($ver = $resultado -> fetch_assoc()) {
                    	$salida.="<tr>
                                    <td>".$ver['titulo']."</td>
                                    <td>".$ver['juegoN']."</td>
                                    <td>".$ver['fecha']."</td>                                
                                    <td>".$ver['hora']."</td>
                                    <td>".$ver['modalidad']."</td>
                                    <td>".$ver['max_jugadores']."</td>
                                    <td>".$ver['forma']."</td>
                                    <td>".$ver['premios']."</td>
                                    <td>".$ver['descripcion']."</td>
                                    <td>".$ver['estatus']."</td>
                                    <td>".$ver['jugador']."</td>

                                     <td><button type='button' class='btn btn-primary'  data-toggle='modal' data-target='#modal' value='".$ver['id']."' onclick='act(".$ver['id'].");'> Actualizar
                                	</td>
                                	<td><button type='button' value='".$ver['id']."' id='eliminar' onclick='preg(".$ver['id'].");' class='btn btn-danger'>Eliminar
                                    </td>
                                   <td><input type='checkbox' name='keyToDelete' value='".$ver['id']."'</td>
                                </tr>";
                    }
                    $salida.="</tbody></table>";
	} else {
		$salida.= "vacio";

	}
	
	echo $salida;
	$link -> close();
?>

