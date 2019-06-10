<?php
	session_start();
	require ('functions.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Crud Formulari</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<style>
			.error {
				color: red;
			}
			table, td, tr{
				border-collapse: collapse;
				border: 1px solid black;
				padding:5px;
			}
			body{
				margin-left: 40px;
			}
		</style>
	</head>
	<body>
		<h1>Lista de usuarios</h1>
		<br>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >  
  		
				<input type="submit" name="alta" value="Añadir usuario">
		</form>
		<br>
		<?php
		//Inicializa variables
			if(isset($_POST["alta"]))
			{	
				header("Location: alta.php");
				exit;
			}
			$resp=consultaBBDD();
		?>	
	</body>
</html>  