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
			$nombreError = $correoError = $apellidosError = $comentariosError = $edadError = $ficheroError = "";
			
			$estado = true;

			if(isset($_POST["borrar"]))
			{	
				if (empty($_POST["nombre"])) 
				{
					$nombreError = "Nombre obligatorio";
					$estado=false;
				} 
				else 
				{
					$nombre = test_input($_POST["nombre"]);
					// comprueba que lleva solo letras y espacios
					if (!preg_match("/^[a-zA-Z ]*$/",$nombre)) {
					  $nombreError = "Solo se admiten letras y espacios en blanco";
					  $estado=false;
					}
				  }

				if (!empty($_POST["apellidos"])) 
				{
					$apellidos = test_input($_POST["apellidos"]);
					// comprueba que lleva solo letras y espacios
					if (!preg_match("/^[a-zA-Z ]*$/",$apellidos)) {
					  $apellidosError = "Solo se admiten letras y espacios en blanco";
					  $estado=false;
					}
				  }

				if (!empty($_POST["edad"])) 
				{
					$edad=$_POST["edad"];
					if ($edad<18)
					{
						$edadError= "Solo se permite a personas mayores de 18 años.";
						$estado=false;
					}
				}

				if (empty($_POST["correo"])) 
				{
					$correoError = "Correo obligatorio";
					$estado=false;
				} 
				else 
				{
					$correo = test_input($_POST["correo"]);
					// Comprueba que el formato es correcto
					if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) 
					{
					  $correoError = "Formato de correo erróneo";
					  $estado=false; 
					}
				}
				if (!empty($_POST["comentarios"])) 
				{
					$comentarios = test_input($_POST["comentarios"]);
				}


				if ($estado==true)
				{
          			if (!$tmp=borrarUsuario($_REQUEST['id'],$_REQUEST['nombre'],$_REQUEST['apellidos'],$_REQUEST['edad'],$_REQUEST['correo'],$_REQUEST['comentarios']))
					{	
						print("<br><span class='rojo'>ERROR al borrar el usuario. Vuelva ha intentarlo</span><br><br>");										
					}
					else
					{
						header("Location: index.php");
						exit;
					}
				}
			}
			else
			{ 

			$idRec=$_REQUEST['id'];
            $sql="SELECT * FROM formulariv4 WHERE id='$idRec'";
			$resultat = mysqli_query($con, $sql) or die('Consulta fallida: ' . mysqli_error($con));
			while ($registre = mysqli_fetch_array($resultat, MYSQLI_ASSOC))
			{	
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
		}
        mysqli_close($con);

    ?>
	<h1> Modificación formulario</h1>
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
			  	<input type="hidden" name="id" value="<?php echo $id;?>">
				<br><br><br>
				<input type="submit" name="borrar" value="Borrar">
	</form>

    </body>
</html> 