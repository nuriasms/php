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
			if(isset($_REQUEST["operacion"]))
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
					<label>Introduce un numero: <input type="text" name="primero"></label>
					<br><br>
					<label>Introduce otro numero: <input type="text" name="segundo"></label>
					<br><br>
					<label>Selecciona operación: </label>
					<input type="submit" name="operacion" value="+">
					<input type="submit" name="operacion" value="-">
					<input type="submit" name="operacion" value="*">
					<input type="submit" name="operacion" value="/">
					
					
				</form>
				<?php
			}
		?>
	</body>
</html>