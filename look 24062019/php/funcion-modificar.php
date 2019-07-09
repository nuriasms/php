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
<!-------------------------------------------MODIFICAR NOTICIA------------------------------------>
		<?php

			//Inicializa variables
			$titulo = $contenido = $nombreFichero = $nombre = $data = $registre = $id = "";
			$tituloError = $ficheroError = $autorError = $contenidoError = "";
			$salir=true;
			$nombre=$_COOKIE['usuario'];

			if(isset($_REQUEST["modificar"])) 
			{	
				
				if (!empty($registre=buscaNoticia($_REQUEST["id"])))
				{
					$id=$registre['idnoticia'];
					$titulo=utf8_encode($registre['titular']);
					$contenido=utf8_encode($registre['noticia']);
					$nombreFichero=$registre['foto'];
					$nombre=utf8_encode(ucwords($registre['autor']));
					$data=$registre['data'];
				}
			}

			if(isset($_REQUEST["enviar"])) 
			{	
				if (empty($_REQUEST['titulo']))
				{
					$tituloError = "<br><br>Titular obligatorio";
					$salir=false;
				} 
				else 
				{
					$titulo = test_input($_REQUEST["titulo"]);
					// comprueba que lleva solo letras y espacios
					if (!preg_match("/^[a-zA-Z\. ,áéíóúAÉÍÓÚÑñ0123456789]*$/",$titulo)) 
					{
						$tituloError = "<br><br>Solo admite texto plano"; 
						$salir=false;
					}
				}

				if (empty($_REQUEST['contenido']))
				{
					$contenidoError = "Contenido obligatorio";
					$salir=false;
				} 
				else
				{
					$contenido = test_input($_REQUEST["contenido"]);
				}

				if ($salir)
				{
					
					if (actualizarNoticia($_REQUEST["id"],$_REQUEST["titulo"],$_REQUEST["contenido"],$_REQUEST["fichero"]))
					{
						header("Location: look-edita.php");
					}
				}
			}
			if (!$salir || !isset($_REQUEST["enviar"]))
			{
		?>
				<div class="recuadronoticia">   
					<div id="registronoticia" >
						<h1>Nueva noticia:</h1>
						<hr>
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">  
							<input type="hidden" name="id" value="<?php echo $id;?>">
							<label for="ftitulo">Titular: </label><input type="text" name="titulo" maxlength="200" size="72" value="<?php echo $titulo;?>" id="ftitulo">
							<span class="error"><?php echo $tituloError;?></span>
							<br><br>
							<label for="fcontenido">Contenido: </label><span class="error"><?php echo $contenidoError;?></span>
							<textarea type="text" name="contenido" rows="15" cols="80" id="fcontenido"><?php echo $contenido;?></textarea>
							<br><br>							
							<label for="ffoto">Foto: </label><input type="text" name="fichero" maxlength="200" size="72" value="<?php echo $nombreFichero;?>" id="ffoto">
							<span class="errorC"><?php echo $ficheroError;?></span>
							<br><br>
							<label for="fautor">Autor: &nbsp;&nbsp;&nbsp;<?php echo utf8_encode(ucwords($nombre));?></label>
							<span class="errorC"><?php echo $autorError;?></span>
							<br><br>
							<?php  $hoy = formatearFecha(date('d-m-Y'));?>
							<label for="ffecha">Fecha: &nbsp;&nbsp;&nbsp;<?php echo $hoy;?></label>
							<br><br><hr>
							<button type="reset" name="reset" class="btn btn-danger" value="Borrar">Limpiar datos</button>
							<button type="submit" name="enviar" class="btn btn-success" value="Enviar">Guardar noticia</button>
						</form>
					</div>
				</div>
			<?php
			}
		?>
		<!-----------------------------------PIE------------------------------------------------------>
		<?php
			include ('../html/pie_look.html');
		?>
	</body>
</html>