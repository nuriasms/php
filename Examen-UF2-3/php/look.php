<?php
    session_start();
    require ('../php/funciones.php');
    $usuario=validarSesionAbierta();  
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
		<link rel="stylesheet" href="../lib/css/bootstrap.min.css">
		<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
		<link rel="icon" href="../img/favicon.ico" type="image/x-icon">
		<script src="../lib/js/jquery.min.js"></script>
		<script src="../lib/js/bootstrap.min.js"></script>
		<title>LOOK</title>
		<link rel="stylesheet" href="../css/style.css"> 
	</head>
	<body>
		<noscript>Disculpe, su navegador no soporta JavaScript!</noscript>
		<!----------------------------------CABECERA------------------------------------------------>
		<header class="container">
			<ul class="barraUsuari"> 
				<li><a href="#" ><span class="glyphicon glyphicon-log-out"></span></a></li>
				<li><span class="nomUsuari">Bienvenid@ <?php echo $usuario;?></span></li>    
			</ul>
			<h1>LOOK</h1>   
		</header>
		
		<?php
			include ('../html/barra.html');
		?>
		<div class="container fotoPortada">
			<h1>Compartimos secretos ...</h1>
		</div>
		<?php
			include ('../html/pie_look.html');
		?>
	</body>
</html>