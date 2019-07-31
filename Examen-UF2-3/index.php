<?php
	session_start();
	require ('php/funciones.php');
	require ('php/contador-visitas.php'); 
?>
<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="description" content="Consulta toda la información para la mujer en el suplemento de LOOK: Moda, tendencias, belleza, pareja, Lifestyle, vídeos  noticias de famosas. ¡Entra!">
		<meta name="keywords" content="Look, revista online, revista look, belleza, trucos de belleza, consejos de belleza, tratamientos esteticos, maquillaje, peluqueria, perfumes, trucos de belleza de famosas,">
		<meta http-equip="Expires" content="no-cache">
		<link rel="stylesheet" href="lib/css/bootstrap.min.css">
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
		<link rel="icon" href="img/favicon.ico" type="image/x-icon">
		<script src="lib/js/jquery.min.js"></script>
		<script src="lib/js/bootstrap.min.js"></script>
		<script src="js/funciones.js"></script>
		<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
		<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
		<script src="js/cabecera.js"></script>
		<title>LOOK</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<noscript>Disculpe, su navegador no soporta JavaScript!</noscript>
		
		<!----------------------------------CABECERA------------------------------------------------>
		<?php
			$origen="inicio";
			include ('html/cabecera.html');
		?>
		<!---------------------------------BARRA NAVEGACIÓN------------------------------------------>
		<?php
			$barra="inicio";
			include ('php/barra.php');
		?>
		<!----------------------------------CONTENIDO--------------------------------------------------->
		<!--div class="container fotoPortada">
			<h1>Compartimos secretos ...</h1>
		</div-->
		<?php
			$origen="inicio";
			include ('php/carousel.php');
		?>	
		<div id="cajacookies">
			<p><button onclick="aceptarCookies()" class="pull-right"><i class="fa fa-times"></i> Aceptar y cerrar éste mensaje</button>
			Éste sitio web usa cookies, si permanece aquí acepta su uso.
			Puede leer más sobre el uso de cookies en nuestra <a href="http://www.interior.gob.es/politica-de-cookies" target="_blank">política de privacidad</a>.</p>
		</div>
		<!------------------------------------PIE------------------------------------------------------->	
		<?php
			include ('html/pie.html');
		?>
	</body>
</html>