<?php
    session_start();
    require ('php/funciones.php');
    //$usuario=validarSesionAbierta();  
?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="lib/css/bootstrap.min.css">
        <script src="lib/js/jquery.min.js"></script>
        <script src="lib/js/bootstrap.min.js"></script>
        <title>Blog voleibol</title>
        <link rel="stylesheet" href="css/style.css"> 
        
	</head>
	<body>
    <noscript>Disculpe, su navegador no soporta JavaScript!</noscript>
		<header>
			<h1>Blog voleibol</h1>
			<img src="img/brazo.jpg">
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
					<h4><?php echo $usuario;?></h4>
    			</div>
			    <ul class="nav navbar-nav">
			      <li class="active"><a href="menu.php">Inicio</a></li>
			      <li><a href="consulta-noticia.php">Consulta noticias</a></li>
			      <li><a href="alta-noticia.php">Alta noticias</a></li>
			      <li><a href="borrar-noticias.html">Borrar noticias</a></li>
			    </ul>
		   		<ul class="nav navbar-nav navbar-right cerrar"> 
	    			<li><button type="button" class="btn btn-danger" onclick="cerrarSesion()"> <span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión </button></li>
	    		</ul>
		  	</div>
        </nav>
       
        
	</body>
</html>