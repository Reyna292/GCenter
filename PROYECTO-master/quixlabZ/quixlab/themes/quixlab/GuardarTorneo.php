  titulo: titulo, fecha:fecha, hora:hora, maxJug:maxJug, premio:premio, descripcion:descripcion
 <?php 
 	 $link = new mysqli("localhost","admin","93ab9f73989e766a77c306ba3e6f7cb8d95309f36378ceed","revolution");
	 $salida = "";
     if(isset($_POST['titulo']) && isset($_POST['idJuego']) && isset($_POST['id_Modal']) && isset($_POST['id_form']) && isset($_POST['id_form']) && isset($_POST['id_jugador']) && isset($_POST['id_Estatus'])){
         $id_jugador = $link->real_escape_string($_POST['id_jugador']); 
         $idJuego = $link->real_escape_string($_POST['idJuego']);     
         $id_Modal = $link->real_escape_string($_POST['id_Modal']);     
         $id_form = $link->real_escape_string($_POST['id_form']);     
         $id_Estatus = $link->real_escape_string($_POST['id_Estatus']); 

         $titulo = $link->real_escape_string($_POST['titulo']); 
         $fecha = $link->real_escape_string($_POST['fecha']); 
         $hora = $link->real_escape_string($_POST['hora']); 
         $max_jugadores= $link->real_escape_string($_POST['maxJug']); 
         $premio = $link->real_escape_string($_POST['premio']); 
         $descripcion = $link->real_escape_string($_POST['descripcion']); 

    
      }
            $query = "INSERT INTO torneos (id, titulo, id_juego, fecha, hora, id_modalidad, max_jugadores, id_forma, premios, descripcion, id_estatus, id_jugador_ganador) 
            				VALUES (NULL, '".$titulo."', '".$idJuego."', '".$fecha."', '".$hora."', '".$id_Modal."', '".$max_jugadores."','".$id_form."', '".$premio."', '".$descripcion."', '".$id_Estatus."', '".$id_jugador."');";   
     
         echo  $query;
        
         $resultado = mysqli_query($link, $query);
 
/*
	if($resultado -> num_rows > 0){
		$ver = $resultado -> fetch_assoc();
		// echo "RESULTADO  " . $ver['monedas'];
		$salida.= $ver['nombre'];
	
	}*/

	echo $salida;
	$link -> close();
 ?>