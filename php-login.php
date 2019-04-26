<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
		<?php
			require ('php-functions-formulari-1.php');
		?>
	</head>
	<body>
		<?php
			if(isset($_REQUEST["enviar"]))
			{	
				print(calcular2());
						
					
				?>
				<br><br>
				<a href="javascript:history.go(-1);">Volver Atras</a>			
			<?php
			}
			else
			{
				?>
				<form  method="POST">
					<label>Nombre: <input type="text" name="nombre" placeholder="login"></label><br>
					<label>Contraseña: <input type="text" name="contrasena" placeholder="password"></label>
					<br><br>
					<in
					
					<input type="submit" name="enviar" value="Aceptar">
					
					
				</form>
				<?php
			}
		?>
	</body>
</html>