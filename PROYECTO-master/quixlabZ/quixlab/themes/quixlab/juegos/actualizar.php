<?php  
    include_once "../connect_db.php";
     
    $salida = "";
     
    if(isset($_GET['consulta'])){
        $q = $link->real_escape_string($_GET['consulta']);
        $sql = "SELECT id, nombre, ruta, imagen
        FROM juegos
        WHERE id = $q;";
    }

    $resultado = $link -> query($sql);
    echo (mysqli_error ($link));

    if($resultado -> num_rows > 0){
        $salida.= "<!DOCTYPE html>
        <html class='h-100' lang='en'>
        <head>
            <meta charset='utf-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width,initial-scale=1'>
            <title>Actualizar juego</title>
            <!-- Favicon icon -->
            <link rel='icon' type='image/png' sizes='16x16' href='../../../assets/images/favicon.png'>
            <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
            <link href='../css/style.css' rel='stylesheet'>
            
        </head>";
        $salida.= "<body>
                    <form class='mt-5 mb-5 login-input' enctype='multipart/form-data' action='_actualizar.php' method='POST'> 
                    <div class='modal-body' id='formularioo'> ";
                    while ($ver = $resultado -> fetch_assoc()) {
                        $salida.="
                        <div class='form-group row'>
                            <label for='resultados' class='col-sm-2 col-form-label'>ID</label> 
                            <div class='col-sm-10'>
                                <input readonly='readonly' type='text' class='form-control form-control-sm' name='id' value='".$ver['id']."''><br> 
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label for='resultados' class='col-sm-2 col-form-label'>Nombre</label>
                            <div class='col-sm-10'>
                                <input type='text' class='form-control form-control-sm'  name='n' value='".$ver['nombre']."''><br>
                            </div>
                        </div> 
                        <div class='form-group row'>
                            <label for='resultados' class='col-sm-2 col-form-label'>Imagen</label>
                            <div class='col-sm-10'>
                                    <div class='form-group'>
                                        <input type='file' class='form-control'  placeholder='Imagen' name='imagen' required>
                                    </div>
                                    
                            </div>
                        </div>
                        ";
                    }
                    $salida.="
                    </div>
                    <div class='modal-footer'>
                        <button class='btn login-form__btn submit w-100'>Guardar</button>
                    </div>
                    </form>
                </body>
                </html>";
    } else {
        $salida.= "vacio";
    }
    
    echo $salida;
    $link -> close();
?>

