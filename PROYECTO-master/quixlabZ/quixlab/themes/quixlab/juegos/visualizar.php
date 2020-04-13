<?php  
     include_once "../connect_db.php";
     
    $salida = "";
    $sql = "SELECT *
    FROM juegos";

    if(isset($_POST['consulta'])){
        $q = $link->real_escape_string($_POST['consulta']);
        
        $sql = "SELECT *
        FROM juegos
        WHERE nombre LIKE %" . $q . "%;";
    }

    $resultado = $link -> query($sql);
    echo (mysqli_error($link));

    if($resultado -> num_rows > 0){
        $salida.= "<!DOCTYPE html>
        <html class='h-100' lang='en'>
        
        <head>
            <meta charset='utf-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width,initial-scale=1'>
            <title>Visualizar juegos</title>
            <!-- Favicon icon -->
            <link rel='icon' type='image/png' sizes='16x16' href='../../../assets/images/favicon.png'>
            <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
            <link href='../css/style.css' rel='stylesheet'>
            
        </head>";
        $salida.= "<body>
                    <table class='table table-xs mb-0'>
                     <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Imagen</th>
                        </tr>
                    </thead>
                    <tbody>";

                    while ($ver = $resultado -> fetch_assoc()) {
                        $salida.="<tr>
                                    <td>".$ver['id']."</td>
                                    <td>".$ver['nombre']."</td>
                                    <td>"; 
                        $salida.= "<img width=150px height=100px src=".$ver['ruta'].">";
                        $salida.= "</td>
                                    <td>
                                        <button type='button' class='btn btn-primary'  data-toggle='modal' data-target='#modal' value='".$ver['id']."' onclick='act(".$ver['id'].");'> Actualizar
                                    </td>
                                    <td>
                                        <button type='button' value='".$ver['id']."' id='eliminar' onclick='preg(".$ver['id'].");' class='btn btn-danger'>Eliminar
                                    </td>
                                </tr>";
                    }
                    $salida.="</tbody></table>";
                    $salida.="<script>
                                function act(id){
                                    window.location.href = 'actualizar.php?consulta='+id;
                                };

                                function preg(id){
                                    alert('Esta a punto de eliminar este juego, click en Aceptar si desea continuar');
                                    window.location.href = 'eliminar.php?consulta='+id;
                                }
                            </script>
                    </body>
                    </html>";
    } else {
        $salida.= "vacio";
    }
    
    echo $salida;
    $link -> close();
?>

