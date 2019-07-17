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
			$barra="";
			if (!empty($usuario))
			{
				$barra = buscaTipoUsuario($usuario);
			}
			else
			{
				$barra="public";
			}
			include ('../html/barra.html');
		?>
		<!---------------------------------CONTENIDO------------------------------------------------->
		<div class="container fotoPortada">
			<h1>Compartimos secretos ...</h1>
		</div>
		<!---------------------------------------PIE------------------------------------------------>
		<?php
			include ('../html/pie.html');
		?>
	</body>
</html>