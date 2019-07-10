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
		<?php
			include ('../html/cabecera.html');
		?>
		<!---------------------------------BARRA NAVEGACIÓN------------------------------------------>
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
					<li class="active"><a href="look-listado.php" >Lista artículos</a></li>
				</ul>
			</div>
		</nav>	
<!-------------------------------------------CONSULTA NOTICIA------------------------------------>
		
		<span id="inicio"></span>
		<div class="bajar">
			<a href="#final" class="glyphicon glyphicon-chevron-down"></a>
		</div>
		<!----------------------------------------CARGAR DATOS----------------------------->
		<?php		
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
				$sql = "SELECT * FROM noticies where autor = '$usuario'";
				$resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
		?>
		<div id="recuadrolistado">   
			<div id="registrolistado" >
				<h3>Listado de noticias</h3>
				<hr>
				<table id="listadoNoticias">
					<tr>
						<th>Ref.</th>
						<th>Titular</th>
						<th>Fecha</th>
						<th>Autor</th>
						<th></th>
						<th></th>
					</tr>
				<?php			
				while ($registre = mysqli_fetch_array($resultat, MYSQLI_ASSOC)) 
				{
				?>
					<tr>				
						<td><?php echo $registre['idnoticia'];?></td>						
						<td><?php echo utf8_encode($registre['titular']);?></td>
						<td><?php echo $registre['data'];?></td>
						<td><?php echo utf8_encode(ucwords($registre['autor']));?></td>	
						<td><a href='#' onClick=\"return confirm('¿Estás seguro de que quiere eliminar este elemento?');\"><span class='glyphicon glyphicon-trash'></span></a></td>
					</tr>
				<?php
				}
				?>
				</table>
			</div>
		</div>
		<?php		
		}
		//mysql_free_result($resultat);
		mysqli_close($con);
		?>
		<div class="subir">
			<a href="#inicio" class="glyphicon glyphicon-chevron-up"></a>
		</div>		
		<span id="final"></span>		
		<!-----------------------------------PIE------------------------------------------------------>
		<?php
			include ('../html/pie.html');
		?>
	</body>
</html>