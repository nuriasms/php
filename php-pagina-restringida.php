<?php
    session_start();
    //print_r($_SESSION);
    //print ($_SESSION["nombre_usuario"]);
    if (!isset($_SESSION["nombre_usuario"])) 
    {
        header("Location: php-login-V2.php");
    }
    else
    {
        print ("<p>Bienvenid@ " . $_SESSION["nombre_usuario"] . "</p>");
        print ("<a href='php-cerrar-sesion.php' title='Cerrar sesión'>Cerrar sesión</a>");
    }
    if (isset($_COOKIE["autologin"])&&$_COOKIE["autologin"]==1)
    {
        $_SESSION["nombre_usuario"] = $_REQUEST['nombre'];
        print ("<p>Bienvenid@ " . $_SESSION["nombre_usuario"] . "</p>");
        print ("<a href='php-cerrar-sesion.php' title='Cerrar sesión'>Cerrar sesión</a>");
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
        <br><br>
        <?php
        if ( isset($_COOKIE['autologin'])) 
        {
            $nombreCookie = $_COOKIE['autologin'] ?: '';
            print ("Cookie nombre es: " . $nombreCookie);
            //printf ($_COOKIE);
        }
        ?>
	</body>
</html>