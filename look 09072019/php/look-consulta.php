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
				<li><span class="nomUsuari glyphicon glyphicon-user"> <?php echo ucwords($usuario);/*echo utf8_encode(ucwords($usuario));*/?></span></li>    
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
					<li class="active"><a href="look-consulta.php" >Consulta noticias</a></li>
					<li><a href="look-alta-noticia.php">Alta artículo</a></li>
					<li><a href="look-edita.php" >Editar artículo</a></li>
				</ul>
			</div>
		</nav>	
<!-------------------------------------------CONSULTA NOTICIA------------------------------------>
		
		<div class="linea">
			<span id="inicio"></span>
			<h2>NOTICIAS RECIENTES</h2>
			<div class="derechatop">
				<a href="pdf.php" ><button type='button' class='glyphicon glyphicon-file redondo'></button></a>
				<a href="correo.php?nom=<?php echo $usuario;?>&url=../doc/Listado_noticias.pdf&fitxer=Listado_noticias.pdf" ><button type='button' class='glyphicon glyphicon-envelope redondo'></button></a>																	
			</div>
			<br>
		</div>
		
		<div class="bajar">
			<a href="#final" class="glyphicon glyphicon-chevron-down"></a>
		</div>
		<!----------------------------------------CARGAR DATOS----------------------------->
		<?php
		$fecha = "";
		// dades de configuració
		$ip = 'localhost';
		$usuari = 'prova';
		$password = 'prova';
		$db_name = 'prova';
		// connectem amb la db
		$con = mysqli_connect($ip,$usuari,$password,$db_name);
		if (!$con)  
		{
			echo "Ha fallat la connexió a MySQL: " . mysqli_connect_errno();
			echo "Ha fallat la connexió a MySQL: " . mysqli_connect_error();
		}
		else
		{	
			$sql = "SELECT * FROM noticies";
			$resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
			
			while ($registre = mysqli_fetch_array($resultat, MYSQLI_ASSOC)) 
			{			
				?>		
				<div class=" publicacion">
					<div class="articulo">						
						<span class="titulo"><h3><?php echo utf8_encode($registre['titular']);?></h3></span>
						<span class="descripcion">
							<p><?php echo utf8_encode($registre['noticia']);?></p>
						</span>
						<br>									
						<h5><span class="autor"><?php echo utf8_encode(ucwords($registre['autor']));?>,&nbsp; <?php echo formatearFecha($registre['data']);?>.</span></h5>
						<a href="funcion-borrar.php?nom=<?php echo $usuario;?>&id=<?php echo $registre['idnoticia'];?>&cas=2" ><button type='button' class='glyphicon glyphicon-trash redondo'></button></a>
					</div>	
					<div class="articuloFoto">
						<img src="<?php echo $registre['foto'];?>" width="300px" alt="Foto no disponible" align="middle">
					</div>
					
				</div>
				<div class="limpiar"><br></div>
				<?php
			}
		}
		//mysql_free_result($resultat);
		mysqli_close($con);
		?>
		<div class="subir">
			<a href="#inicio" class="glyphicon glyphicon-chevron-up"></a>
		</div>
		<div class="linea">
			<span id="final"></span>
		</div>
		<!-----------------------------------PIE------------------------------------------------------>
		<?php
			include ('../html/pie_look.html');
		?>
	</body>
</html>