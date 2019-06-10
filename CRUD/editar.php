<?php
	session_start();
	require ('functions.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Crud Formulari Editar</title>
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

			if(isset($_POST["modificar"]))
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
          			if (!$tmp=modificarUsuario($_REQUEST['id'],$_REQUEST['nombre'],$_REQUEST['apellidos'],$_REQUEST['edad'],$_REQUEST['correo'],$_REQUEST['comentarios']))
					{	
						print("<br><span class='rojo'>ERROR al modificar el usuario. Vuelva ha intentarlo</span><br><br>");										
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
		<br>
		<?php
			include ('form.php');
		?>
		<!--form action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data"-->
			<input type="submit" name="modificar" value="Modificar">
		</form>		
    </body>
</html> 