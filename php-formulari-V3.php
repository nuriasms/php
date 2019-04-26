<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Formulari proba V2</title>
		<?php
			require ('php-functions-formulari-1.php');
		?>
	</head>
	<body>
		<?php
			if(isset($_REQUEST["enviar"]))
			{	
				$respuesta=validarFrase($_POST['frase']);
				if ($respuesta)
				{
					print("La frase está encadenada");
				}
				else
				{
					print("La frase NO está encadenada");
				}
				
					
				?>
				<br><br>
				<a href="javascript:history.go(-1);">Volver Atras</a>			
			<?php
			}
			else
			{
				?>
				<form action="php-formulari-V3.php" method="POST">
					<label>Introduce una frase: <input type="text" name="frase">
					<input type="submit" name="enviar" value="aceptar"></label>
				</form>
				<?php
			}
		?>
	</body>
</html>