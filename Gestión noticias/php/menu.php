<?php
    session_start();
    //print_r($_SESSION);
    //print ($_SESSION["nombre_usuario"]);
   
    if (isset($_SESSION["nombre_usuario"])||(isset($_COOKIE["usuario"])&&(isset($_COOKIE["contrasena"]))))
    {
        if(isset($_SESSION["nombre_usuario"]))
        {
            print ("<p>Bienvenid@ " . $_SESSION["nombre_usuario"] . "</p>");    
        }
        else
        {        
            print ("<p>Bienvenid@ " . $_COOKIE["usuario"] . "</p>");
        }
        print ("<a href='cerrar-sesion.php' title='Cerrar sesión'>Cerrar sesión</a>");
    }
    else
    {
        header("Location: ../index.php");
    }
    
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Página restringida</title>
		<?php
			require ('php-functions-formulari-1.php');
		?>
		
	</head>
	<body>
        <h2>Web restringida</h2>
        <p>Has entrado ;)</p>
        <br><br>
        
	</body>
</html>