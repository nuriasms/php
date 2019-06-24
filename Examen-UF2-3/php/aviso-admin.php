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
		<script src="../js/funciones.js"></script>
		<title>LOOK</title>
		<link rel="stylesheet" href="../css/style.css"> 
	</head>
	<body>
		<noscript>Disculpe, su navegador no soporta JavaScript!</noscript>
		<!----------------------------------CABECERA------------------------------------------------>
		<header class="container">
			<ul class="barraUsuari"> 
				<li><form method="get">
						<button type="submit" name="cerrar" class="glyphicon glyphicon-log-out nada"></button>
					</form></li>
				<li><span class="nomUsuari glyphicon glyphicon-user"> <?php echo utf8_encode(ucwords($usuario));?></span></li>    
			</ul>
			<h1>LOOK</h1>   
		</header>
		
		<nav class="navbar navbar-default">		 
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="container-fluid collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
                <li><a href="look.php">Inicio</a></li>
					<li><a href="look-consulta.php" >Consulta noticias</a></li>
					<li><a href="look-alta-noticia.php">Alta artículo</a></li>
					<li class="active"><a href="look-edita.php" >Editar artículo</a></li>
				</ul>
			</div>
		</nav>	
<!----------------------------AVISO MENÚ NO ACTIVO -------------------------------------------->
        
        <div class="erroradmin">                        
            <h2>AVISO:</h2>
            <h2>ACCESO DENEGADO</h2>
            <br>
            <p><b>Para acceder a este menú debe tener permisos especiales.</b></p>
            <br>
            <p>Si requiere su acceso, pongase en contacto con su administrador.</p>
            <br>					
        </div> 
        <?php
			include ('../html/pie_look.html');
		?>    
    </body>
</html>