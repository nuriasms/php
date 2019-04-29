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
			$tmp=false;
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
						
						print("<br><span class='rojo'>ERROR</span><br><br>");
						//header("Refresh:1; url=php-login.php");
						$tmp=false;						
					}
					else
					{
						print("<br><span class='verde'>OK</span><br>");
						//header("location:php-loginOK.php");
						$tmp=true;
					}
				}
				?>
				<!--br><br>
				<a href="javascript:history.go(-1);">Volver Atras</a-->			
			<?php
			}
			if (!$tmp)
			{
				?>
				<form method="POST">
					<label>Nombre: <input type="text" name="nombre" placeholder="login"></label>
					<br><br>
					<label>Contraseña: <input type="password" name="contrasena" placeholder="password"></label>
					<br><br>	
					<input type="submit" name="enviar" value="Aceptar">
				</form>
				<?php
			}
		?>
	</body>
</html>