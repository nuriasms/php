<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Crud Formulari</title>
		<?php
			require ('functions.php');
		?>
		<style>
			.error {
				color: red;
			}
			body{
				margin-left:40px;
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
          			if (!$tmp=altaUsuario($_REQUEST['nombre'],$_REQUEST['apellidos'],$_REQUEST['edad'],$_REQUEST['correo'],$_REQUEST['comentarios'],$nombreFichero))
					{	
						print("<br><span class='rojo'>ERROR al dar de alta el usuario. Vuelva ha intentarlo</span><br><br>");										
					}
					else
					{
						header("Location: index.php");
						exit;
					}
				}
			} 
		?>
		<h1>Formulario de alta de usuario</h1>
		<br>
		<?php
			include ('form.php');
		?>
		<!--form action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data"-->
			<input type="submit" name="enviar" value="Añadir usuario">
		</form>		
	</body>
</html> 