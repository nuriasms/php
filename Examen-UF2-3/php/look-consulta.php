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
		<?php
			require ('../html/head.html');
		?>
	</head>
	<body>
		<noscript>Disculpe, su navegador no soporta JavaScript!</noscript>
		<!----------------------------------CABECERA------------------------------------------------>
		<?php
			include ('../html/cabecera.html');
		?>
		<!---------------------------------BARRA NAVEGACIÓN------------------------------------------>
		<?php
			$opcio="menu2";
			$barra="look";
			include ('../html/barra.html');
		?>
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
			include ('../html/pie.html');
		?>
	</body>
</html>