<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Formulari proba</title>
		<?php
			require ('php-functions-data-mes-gran.php');
		?>
		
	</head>
	<body>
		<form method="POST">
			Edad: <input type="text" name="edad">
			<input type="submit" name="submit" value="aceptar">
		</form>
		<?php
			$edad= $_POST['edad'];
			print("La edad es: $edad");
		?>
	</body>
</html>