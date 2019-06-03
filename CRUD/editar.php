<?php
	session_start();
	require ('functions.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Crud Formulari Editar</title>
		
	</head>
	<body>
    <?php
        $ip = 'localhost';
		$usuari = 'root';
		$password = '';
		$db_name = 'valida_login';

		// connectem amb la db
		$con = mysqli_connect($ip,$usuari,$password,$db_name);
		if (!$con)  
		{
			echo "Ha fallat la connexió a MySQL: " . mysqli_connect_errno();
			echo "Ha fallat la connexió a MySQL: " . mysqli_connect_error();
		}
		else
		{	     
            $id = $nombre = $apellidos= $edad = $correo = $comentarios = $fichero ="";

            $idRec=$_REQUEST['id'];
            $sql="SELECT * FROM formulariv4 WHERE id='$idRec'";
			$resultat = mysqli_query($con, $sql) or die('Consulta fallida: ' . mysqli_error($con));
			while ($registre = mysqli_fetch_array($resultat, MYSQLI_ASSOC))
			{	
                printf ($registre);
				foreach ($registre as $col_value) 
				{
                    $id=$registre['id'];
                    $nombre=$registre['nombre'];
                    $apellidos=$registre["apellido"];
                    $edad=$registre['edad'];
                    $correo=$registre['correo'];
                    $comentarios=$registre['comentarios'];
                    $fichero=$registre['fichero'];   
				}
			}	
		}
        mysqli_close($con);
        $nombre="nuria";

    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">  
  			<label>Nombre *: </label><input type="text" name="nombre" value="<?php echo $nombre;?>">
  			<span class="error"><?php echo $nombreError;?></span>
  			<br><br>
				<label>Apellidos: </label><input type="text" name="apellidos" value="<?php echo $apellidos;?>">
  			<span class="error"><?php echo $apellidosError;?></span>
  			<br><br>
				<label>Edad: </label><input type="number" name="edad" value="<?php echo $edad;?>">
  			<span class="error"><?php echo $edadError;?></span>
  			<br><br>
				<label>Correo *: </label><input type="email" name="correo" value="<?php echo $correo;?>">
  			<span class="error"><?php echo $correoError;?></span>
  			<br><br>
				<label>Comentarios: </label><textarea name="comentarios" rows="5" cols="40"><?php echo $comentarios;?></textarea>
				<br><br>
				<label>Datos adjuntos: </label>
				<input type="hidden" name="max_file_size" value="102400">
				<input type="file" name="fichero">
  			<span class="error"><?php echo $ficheroError;?></span>
				<br><br><br>
				<input type="submit" name="enviar" value="Enviar">
	</form>

    </body>
</html> 