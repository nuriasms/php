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
					
					$edad= $_POST['edad'];
					if ($edad <0 || $edad >115 || $edad==null)
					{
						print("La edad es errónea: $edad");
					}
					else
					{
						print("La edad es correcta: $edad");			
					}?>
					<br><br>
					<a href="javascript:history.go(-1);">Volver Atras</a>			
			<?php
			}
			else
			{
				?>
				<form action="php-formulari-proba-V2.php" method="POST">
					<label>Edad: <input type="text" name="edad">
					<input type="submit" name="enviar" value="aceptar"></label>
				</form>
				<?php
			}
		?>
	</body>
</html>