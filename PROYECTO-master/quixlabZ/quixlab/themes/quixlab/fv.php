 <?php 
 	 $link = new mysqli("localhost","admin","93ab9f73989e766a77c306ba3e6f7cb8d95309f36378ceed","revolution");
	 $salida = "";
     if(isset($_POST['id'])){
         $var = $link->real_escape_string($_POST['id']);     
      }
            $query2 = "SELECT monedas from gamers where id=".$var.";";   
       ///  echo  $var;
        // echo  $query2;
        
         $resultado = mysqli_query($link, $query2);
 

	if($resultado -> num_rows > 0){
		$ver = $resultado -> fetch_assoc();
		// echo "RESULTADO  " . $ver['monedas'];
		$salida.= $ver['monedas'];
	
	}

	echo $salida;
	$link -> close();
 ?>