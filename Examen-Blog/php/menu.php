<?php
    session_start();
    require ('funciones.php');
    $usuario=validarSesionAbierta();  
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="description" content="Blog dedicada a la promoción de un deporte de equipo como es el VOLEIBOL.">
		<meta name="keywords" content="voleibol, saque, bloqueo, remate, libero, central, punta, opuesto, barillas, red, campo, receptor, zaguero, entrenador, club, arbitro, balón">
		<meta http-equip="Expires" content="no-cache">
		<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
		<link rel="icon" href="../img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="../lib/css/bootstrap.min.css">
		<script src="../lib/js/jquery.min.js"></script>
		<script src="../lib/js/bootstrap.min.js"></script>
		<script src="../js/funciones.js"></script>
		<title>Blog voleibol</title>
		<link rel="stylesheet" href="../css/style.css"> 
	</head>
	<body onload="cargar('publicaciones.php','menu1')">
    <noscript>Disculpe, su navegador no soporta JavaScript!</noscript>
		<header>
			<h1>Blog voleibol</h1>
			<span id="inicio"></span>
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
			  <div class="navbar-header">
					<img src="../img/balon.jpg">
    		</div>
			  <ul class="nav navbar-nav">
					<li id="menu1" class="active"><a onclick="cargar('publicaciones.php','menu1')">Inicio</a></li>
			    <li id="menu2" class="inactive"><a onclick="cargar('alta-publicaciones.php','menu2')">Alta publicaciones</a></li>
			  </ul>
		  	<ul class="nav navbar-nav navbar-right cerrar"> 
					<li><h4><?php echo $usuario;?></h4></li>
	    		<li><button type="button" class="btn btn-danger" onclick="cerrarSesion()"> <span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión </button></li>
	    	</ul>
		  </div>
    </nav>
		<!---------------------------------INICIO cuerpo a cambiar-----------------------------------> 
		<div class="container" id="capa">

		</div>
		<!---------------------------------FIN cuerpo a cambiar--------------------------------------> 
		<footer>
			<ul id="redes">
				<li ><a href="https://es-es.facebook.com" target="blank"><img src="../img/a-facebook1.png" id="facebook"></a></li>
				<li><a href="https://twitter.com/?lang=e" target="blank"><img src="../img/a-twitter1.png" id="twitter"></a></li>
				<li><a href="mailto:voleibol@gmail.com"><img src="../img/a-correo.png" id="correu"></a></li>
			</ul>
			<div id="derecha">
					<a href="#" data-toggle="modal" data-target="#myModal">Condiciones legales del servicio</a>	
					<p id="copyright">&copy; 2019 Blog Voleibol All Rights Reserved.</p>
					</div>		
		</footer>
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Información del servicio</h4>
							</div>
						<div class="modal-body">
								<h2>Condiciones legales del servicio</h2>
										<p><i>El usuario de la web se compromete a hacer un uso de ésta y de sus contenidos y servicios de acuerdo con los términos y condiciones, así como a respetar y cumplir en todo momento la ley y cualquier disposición normativa vigente y aplicable. <br><br>
										Queda prohibido el uso y acceso a la web mediante cualquier aplicación, programa informático o sistema análogo que pueda dañar o obstaculizar su funcionamiento normal, incluyendo la alteración, la eliminación o el bloqueo de los contenidos y servicios que se ofrece, o de cualquier otro mecanismo que les pueda afectar, especialmente aquellos que puedan suponer la privación del acceso y uso en la web, o cualquier parte de ésta, a terceros.</i></p>
										<h2>Información básica de privacidad</h2>
										<p><i>Queda igualmente prohibido el acceso a la web mediante programas u otros mecanismos informáticos que, de forma voluntaria o involuntaria, puedan resultar en una sobrecarga de los recursos utilizados por la compañía para mantener la web accesible al público y / o que permitan un acceso no autorizado los apartados de la web no accesibles al público en general o al sistema informático en el que se encuentra alojada; de manera que puedan introducir virus u otros programas maliciosos o scripts que causen errores en el sistema informático mencionado o en el funcionamiento de la web.</i></p>
						</div>
						<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</div>
				</div>
			</div>
		</div>         
	</body>
</html>