<?php
    session_start();
    require ('funciones.php');
    validarSesionAbierta();  
?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../lib/css/bootstrap.min.css">
        <script src="../lib/js/jquery.min.js"></script>
        <script src="../lib/js/bootstrap.min.js"></script>
        <title>Gestión noticias-Menú</title>
        <link rel="stylesheet" href="../css/style.css"> 
        
	</head>
	<body>
        <noscript>Disculpe, su navegador no soporta JavaScript!</noscript>
		<header>
			<span id="inicio"></span>
			<!--img src="img/logo.png" alt="Logo del planetario"-->
			<h1>Menú noticias</h1>
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

    			</div>
			    <ul class="nav navbar-nav">
			      <li class="active"><a href="menu.php">Inicio</a></li>
			      <li><a href="consulta-noticias.php">Consulta noticias</a></li>
			      <li><a href="alta-noticias.php">Alta noticias</a></li>
			      <li><a href="borrar-noticias.html">Borrar noticias</a></li>
			    </ul>
		   		<ul class="nav navbar-nav navbar-right"> 
                   <!--li>
                       <div class="input-group">
		    				    <span class="input-group-addon" onclick="buscar(document.all.busca.value)"><span class="glyphicon glyphicon-search"></span></span>
		    				    <input type="text" class="form-control" name="busca" placeholder="Buscar ">
                        </div>
                    </li-->


			    	<li><form class="navbar-form input-group">
							<input type="text" class="form-control" placeholder="Buscar" name="busca">
	      					<button type="button" class="input-group-addon lupa" onclick="buscar(document.all.busca.value)"><span class="glyphicon glyphicon-search"></span></button>
	    				</form>
	    			</li>
	    			<li><button type="button" class="btn btn-danger"> <span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión </button></li>
	    		</ul>
		  	</div>
        </nav>
       
        
	</body>
</html>