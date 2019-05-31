<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Consulta</title>
		<?php
			require ('funcions.php');
		?>
		<style>
			.error {
				color: red;
			}
		</style>
	</head>
	<body>
		<?php
			//Inicializa variables
			$nombreError = $correoError = $apellidosError = $comentariosError = $edadError = $ficheroError = "";
			$nombre = $correo = $apellidos = $comentarios = $edad = $fichero = "";
			$estado = true;

			if(isset($_POST["enviar"]))
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

				$nombreFichero=validarFichero();
				if (empty($nombreFichero))
				{
					$ficheroError = "No se ha podido subir el fichero";
					$estado=false;
				}

				if ($estado==true)
				{
					print("<p>Nombre: ".$nombre."</p>");
					print("<p>Apellidos: ".$apellidos."</p>");
					print("<p>Edad: ".$edad."</p>");
					print("<p>Correo: ".$correo."</p>");
					print("<p>Comentario: ".$comentarios."</p>");
					print("<img src='".$nombreFichero."'>");
				}
			}
			else
			{
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
		<?php
		}
		?>
	</body>
</html> 