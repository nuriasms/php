<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Calculadora</title>
		<?php
			require ('php-functions-formulari-1.php');
		?>
	</head>
	<body>
		<?php
			if(isset($_REQUEST["enviar"]))
			{	
				print(calcular());
						
					
				?>
				<br><br>
				<a href="javascript:history.go(-1);">Volver Atras</a>			
			<?php
			}
			else
			{
				?>
				<form  method="POST">
					<label>Introduce un numero: <input type="text" name="primero"></label>
					<br>
					<label>Introduce otro numero: <input type="text" name="segundo"></label>
					<br><br>
					<label>Selecciona operación: </label>
					<br>
					<label>Suma</label><input type="radio" name="operacion" value="suma"><br>
					<label>Resta</label><input type="radio" name="operacion" value="resta"><br>
					<label>Multiplicación</label><input type="radio" name="operacion" value="multiplicacion"><br>
					<label>División</label><input type="radio" name="operacion" value="division">
					<br><br>
					<input type="submit" name="enviar" value="calcular"></label>
				</form>
				<?php
			}
		?>
	</body>
</html>