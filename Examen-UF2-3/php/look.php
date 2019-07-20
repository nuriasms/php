<?php
    session_start();
    require ('../php/funciones.php');
	$usuario=validarSesionAbierta(); 

    if(isset($_REQUEST["cerrar"])) 
    {	
        cerrarSesion();
    }  
?>

<!DOCTYPE html>
	<html lang="en">
	<head>
		<?php
			require ('../html/head.html');
		?>
	</head>
	<body>
		<noscript>Disculpe, su navegador no soporta JavaScript!</noscript>
		<!----------------------------------CABECERA------------------------------------------------>
		<?php
			$origen="look";
			include ('../html/cabecera.html');
		?>
		<!---------------------------------BARRA NAVEGACIÓN------------------------------------------>
		<?php
			$opcio="menu1";
			if (!validarTipoUsuario($usuario,'admin'))
			{
				$barra="privado";
			}
			else
			{
				$barra="admin";
			}
			include ('../php/barra.php');
		?>
		<!---------------------------------CONTENIDO------------------------------------------------->
		<!--div class="container fotoPortada">
			<h1>Compartimos secretos ...</h1>
		</div-->
		<?php
			$origen="look";
			include ('carousel.php');
		?>	

		<!---------------------------------------PIE------------------------------------------------>
		<?php
			$origen="look";
			include ('../html/pie.html');
		?>
	</body>
</html>