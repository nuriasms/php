<?php
	session_start();
	require ('functions.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Crud Formulari</title>
		<style>
			.error {
				color: red;
			}
		</style>
	</head>
	<body>
		<h1>Lista de usuarios</h1>
		<?php
		//Inicializa variables
			$resp=consultaBBDD();
		?>	

			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >  
  		
				<input type="submit" name="alta" value="Añadir usuario">
			</form>
		
	</body>
</html> 