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
		<form action="php-formulari-proba-valida.php" method="POST">
			Edad: <input type="text" name="edad">
			<input type="submit" name="submit" value="aceptar">
		</form>
		
	</body>
</html>