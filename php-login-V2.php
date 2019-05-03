<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
		<?php
			require ('php-functions-formulari-1.php');
		?>
		<style>
			.verde{
				color:green;
			}
			.rojo{
				color:red;
			}
		</style>
	</head>
	<body>
		<?php
			
			if(isset($_REQUEST["enviar"])) 
			{	
				if (empty($_REQUEST['nombre']) || empty($_REQUEST['contrasena']))
				{
					print ("Debe introducir el nombre y la contraseña no puede estar vacío. <br>"); 
				}
				else
				{
					if (!$tmp=validarUsuario($_REQUEST['nombre'],$_REQUEST['contrasena']))
					{
						
						print("<br><span class='rojo'>ERROR al validar usuario</span><br><br>");										
					}
					else
					{
						if ((isset($_POST['recordar'])) && ($_POST['recordar'] == 1))
						{
							setcookie("usuario",$_REQUEST['nombre'],strtotime( '+30 days' ),"/",false, false);
							setcookie("contrasena",$_REQUEST['contrasena'],strtotime( '+30 days' ),"/",false, false);  
							print ('<p class="verde">Se ha guardado su usuario.</p>');
						}
						//print("<br><span class='verde'>OK</span><br>");
						$_SESSION["nombre_usuario"] = $_REQUEST['nombre'];
						if(isset($_SESSION["nombre_usuario"]))
						{
							header("Location: php-pagina-restringida.php");
						}
					}
				}
			}
			
		?>
			<form method="POST">
				<label>Nombre: <input type="text" name="nombre" placeholder="login"></label>
				<br><br>
				<label>Contraseña: <input type="password" name="contrasena" placeholder="password"></label>
				<br><br>
				<label>Recordar sesión <input type="checkbox" name="recordar" value="1"></label>
				<br><br>
				<input type="submit" name="enviar" value="Aceptar">
			</form>		
		
	</body>
</html>