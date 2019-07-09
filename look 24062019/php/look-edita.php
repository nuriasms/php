<?php
    session_start();
    require ('../php/funciones.php');
	$usuario=validarSesionAbierta();
	if (!validarAdmin($usuario))
	{
		header("Location: aviso-admin.php");
	}

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
				$sql = "SELECT * FROM noticies";
				$resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
		?>
		<div id="recuadrolistado">   
			<div id="registrolistado" >
				<h3>Listado de noticias</h3>
				<hr>
				<table id="listadoNoticias">
					<tr>
						<th valign="middle" align="left">Ref.</th>
						<th colspan="9" valign="middle" align="left">Titular</th>
						<th colspan="2" valign="middle" align="left">Fecha</th>
						<th colspan="3" valign="middle" align="left">Autor</th>
						<th></th>
						<th></th>
					</tr>
				<?php			
				while ($registre = mysqli_fetch_array($resultat, MYSQLI_ASSOC)) 
				{
				?>
					<tr>				
						<td valign="middle" align="left"><?php echo $registre['idnoticia'];?></td>						
						<td colspan="9" valign="middle" align="left"><?php echo utf8_encode($registre['titular']);?></td>
						<td colspan="2" valign="middle" align="left"><?php echo $registre['data'];?></td>
						<td colspan="3" valign="middle" align="left"><?php echo utf8_encode(ucwords($registre['autor']));?></td>				
						<!--td><a href='editar.php?id=$registre[id]'><button type='button' class='btn btn-default'><span class='glyphicon glyphicon-pencil'></span></button></a></td-->
						<td valign="middle" align="center"><a href='funcion-modificar.php?modificar&id=<?php echo $registre['idnoticia'];?>'><span class='glyphicon glyphicon-pencil'></span></a></td>
						<!--td valign="middle" align="center"><a href='#'><span class='glyphicon glyphicon-pencil'></span></a></td-->

						<!--td><a href='borrar.php?id=$registre[id]' onClick=\"return confirm('¿Estás seguro de que quiere eliminar este elemento?');\"><button type='button' class='btn btn-default'><span class='glyphicon glyphicon-trash'></span></button></a></td-->
						<!--td valign="middle" align="center"><a href='#' onClick=\"return confirm('¿Estás seguro de que quiere eliminar este elemento?');\"><span class='glyphicon glyphicon-trash'></span></a></td-->
						<td valign="middle" align="center"><a href="funcion-borrar.php?nom=<?php echo $registre['autor'];?>&id=<?php echo $registre['idnoticia'];?>&cas=1" onClick=\"return confirm('¿Estás seguro de que quiere eliminar este elemento?');\"><span class='glyphicon glyphicon-trash'></span></a></td>
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
			include ('../html/pie_look.html');
		?>
	</body>
</html>