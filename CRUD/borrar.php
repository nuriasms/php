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
			body{
				margin:80px;
				color:darkred;
			}
			input{
				margin:0 50px;
			}
			.marc{
				border:2px solid darkred;
				background: #FFA07A;
				padding: 50px;
				text-align: center;
			}
		</style>
		
	</head>
	<body>
    <?php
        $ip = 'localhost';
		$usuari = 'root';
		$password = '';
		$db_name = 'valida_login';

		/*if(isset($_POST["cancelar"]))
		{
			header("Location: index.php");
			exit;
		}
		if(isset($_POST["aceptar"]))
		{	*/	

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
			mysqli_close($con);
		/*}*/
    ?>
		<!--div class="marc">
			<h3>Esta acción borrará el usuario indicado. ¿Quiere seguir con el borrado?</h3>
			<br>
			<form method="post">
				<input type="submit" name="aceptar" value="Aceptar">
				<input type="submit" name="cancelar" value="Cancelar">
			</form>
		</div-->
    </body>
</html> 