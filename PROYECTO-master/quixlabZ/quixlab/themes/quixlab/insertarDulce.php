<?php
  
 require("connect_db.php");
     
   if($_SERVER['REQUEST_METHOD']=='POST'){

  // if(isset($_POST["val-username"])!="" and $_POST["val-phoneus"]!="" and $_POST["val-suggestions"]!="" and $_POST['val-skill']!="" and $_POST['val-skill2']!=""){

    
    $gamer= $_POST["val-jugado"];
    //$total=$_POST["val-monedas"];
    $dulceria=$_POST["val-jugador"];
    $cantidad=$_POST[" val-monedas"];

   



    $consulta="INSERT into compras_realizadas(id_dulceria,id_gamer,cantidad) values('$dulceria','$gamer','$cantidad')";

       
         $resultado2=mysqli_query($link, $consulta);       
         header('Location:form-validationDulce.php');

}
    
?>







