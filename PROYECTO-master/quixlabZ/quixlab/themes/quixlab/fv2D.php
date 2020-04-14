  <?php 
 	 $link2 = new mysqli("localhost","admin","93ab9f73989e766a77c306ba3e6f7cb8d95309f36378ceed","revolution");

	 $salida = "";
     if(isset($_POST['id'])){
         $var = $link2->real_escape_string($_POST['id']);     
      }
            $query2 = "SELECT precio from dulceria where id=".$var.";";   
       ///  echo  $var;
        // echo  $query2;
        
         $resultado = mysqli_query($link2, $query2);
	if($resultado -> num_rows > 0){
		$ver = $resultado -> fetch_assoc();
		// echo "RESULTADO  " . $ver['monedas'];
		$salida.= $ver['precio'];
	}
	echo $salida;
	$link2 -> close();
 ?>