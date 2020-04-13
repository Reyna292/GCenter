<?php  
	include_once "../connect_db.php";
	 
    $salida = "";
	 
	if(isset($_GET['consulta'])){
		$q = $link->real_escape_string($_GET['consulta']);
		$sql = "SELECT c.id, p.id AS p_id, p.nombre, c.serial, p.costo_por_hora, p.costo_en_monedas
        FROM consolas c, plataformas p
        WHERE p.id = c.id_plataforma AND c.id = " . $q . ";";

        $sql2 = "SELECT p.id, p.nombre 
        FROM plataformas p, consolas c
        WHERE p.id != c.id_plataforma AND c.id = " . $q . ";";
	}

    $resultado = $link -> query($sql);
    $resultado2 = $link -> query($sql2);
	echo (mysqli_error ($link));

	if($resultado -> num_rows > 0){
        $salida.= "<!DOCTYPE html>
        <html class='h-100' lang='en'>
        <head>
            <meta charset='utf-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width,initial-scale=1'>
            <title>Actualizar consola</title>
            <!-- Favicon icon -->
            <link rel='icon' type='image/png' sizes='16x16' href='../../../assets/images/favicon.png'>
            <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
            <link href='../css/style.css' rel='stylesheet'>
            
        </head>";
        $salida.= "<body> 
                <div class='modal-body' id='formularioo'> ";
                    while ($ver = $resultado -> fetch_assoc()) {
                    	$salida.=" 
                        <div class='form-group row'>
                            <label for='resultados' class='col-sm-2 col-form-label'>ID</label> 
                            <div class='col-sm-10'>
                                <label type='text' class='form-control form-control-sm'>".$ver['id']."<label><br> 
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label for='resultados' class='col-sm-2 col-form-label'>Plataforma</label>
                            <div class='col-sm-10'>
                                <select class='form-control form-control-sm' id='p'>
                                <option value='".$ver['p_id']."'>".$ver['nombre']."</option>";
                                while ($ver2 = $resultado2 -> fetch_assoc()) {
                                    $salida.="
                                    <option value='".$ver2['id']."'>".$ver2['nombre']."</option>";
                                };
                            $salida.="</div>
                        </div>
                        <div class='form-group row'>
                            <label for='resultados' class='col-sm-2 col-form-label'>Numero serial</label>
                            <div class='col-sm-10'>
                                <input type='text' class='form-control form-control-sm'  id='s' value='".$ver['serial']."''><br>
                            </div>
                        </div>    
                        <div class='form-group row'>
                            <label for='resultados' class='col-sm-2 col-form-label'>Costo por hora</label>
                            <div class='col-sm-10'>
                                <input type='text' class='form-control form-control-sm'  id='ch' value='".$ver['costo_por_hora']."''><br>
                            </div>
                        </div>    
                        <div class='form-group row'>
                        <label for='resultados' class='col-sm-2 col-form-label'>Costo en monedas</label>
                            <div class='col-sm-10'>
                                <input type='text' class='form-control form-control-sm'  id='cm' value='".$ver['costo_en_monedas']."''><br>
                            </div>
                        </div>";
                    }
                    $salida.="
                    </div>
                    <div class='modal-footer'>
                        <button type='button' value='".$q."' onclick='guard(".$q.");' class='btn btn-primary btn-sm'>Guardar</button>
                    </div>";
                    $salida.="<script>
                                function guard(id){
                                    let p = document.getElementById('p').value
                                    let s = document.getElementById('s').value
                                    let ch = document.getElementById('ch').value
                                    let cm = document.getElementById('cm').value

                                    window.location.href = '_actualizar.php?id='+id+'&plataforma='+p+'&serial='+s+'&costo='+ch+'&monedas='+cm;
                                };
                            </script>
                    </body>
                    </html>";
	} else {
		$salida.= "vacio";
	}
	
	echo $salida;
	$link -> close();
?>

