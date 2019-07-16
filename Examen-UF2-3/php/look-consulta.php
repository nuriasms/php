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
		<span id="inicio"></span>
		<?php
			include ('../html/cabecera.html');
		?>
		<!---------------------------------BARRA NAVEGACIÓN------------------------------------------>
		<?php
			$opcio="menu2";
			$barra="look";
			include ('../html/barra.html');
		?>
		<!---------------------------------BARRA BUSQUEDA------------------------------------------>
		<nav class="navbar navbar-default">		 
			
					<form class="navbar-form navbar-right botodreta">
						<!--input type="text" class="form-control" placeholder="Buscar texto en pantalla" name="buscatexto">
						<button type="button" class="btn btn-default" onclick="buscar(document.all.buscatexto.value)"><span class="glyphicon glyphicon-search"></span></button-->
						<input type="text" class="form-control" placeholder="Buscar noticias de ..." name="textobusca">
	      				<button type="submit" class="glyphicon glyphicon-search redondo" name="buscar" title="Busca noticias que contengan el texto"></button>
					</form>
					 
	    	
		</nav>
		<!-------------------------------------------CONSULTA NOTICIA------------------------------------>
		
		<div class="linea">
			<h2>NOTICIAS RECIENTES</h2>
			<div class="derechatop">
				<a href="pdf.php" ><button type='button' class='glyphicon glyphicon-file redondo' title="Crear PDF con las noticias"></button></a>
				<a href="correo.php?nom=<?php echo $usuario;?>&url=../doc/Listado_noticias.pdf&fitxer=Listado_noticias.pdf" ><button type='button' class='glyphicon glyphicon-envelope redondo' title="Enviar PDF de noticias por correo"></button></a>																	
			</div>
			<br>
		</div>
		
		<div class="bajar">
			<a href="#final" class="glyphicon glyphicon-chevron-down"></a>
		</div>
		<!----------------------------------------CARGAR DATOS----------------------------->
		<?php
			$fecha = $row = "";
			$con = conectaBBDD();
			if (isset($_REQUEST["buscar"]))
			{
				$sql = "SELECT * FROM noticies WHERE titular LIKE '%$_REQUEST[textobusca]%' ORDER BY data DESC";
				$resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
				$sql = "SELECT * FROM noticies WHERE noticia LIKE '%$_REQUEST[textobusca]%' ORDER BY data DESC";
				$resultat .= mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
				$sql = "SELECT * FROM noticies WHERE autor LIKE '%$_REQUEST[textobusca]%' ORDER BY data DESC";
				$resultat .= mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
				SELECT * FROM noticies WHERE titular LIKE '%verano%' ORDER BY data DESC OR noticia LIKE '%verano%' ORDER BY data DESC;
			}
			else
			{
				$sql = "SELECT * FROM noticies ORDER BY data DESC";
				$resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
			}
			//$resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
			
			if ($row = mysqli_fetch_array($resultat, MYSQLI_ASSOC))
			{
				while ($registre = mysqli_fetch_array($resultat, MYSQLI_ASSOC)) 
				{			
		?>		
					<div class=" publicacion">
						<div class="articulo">						
							<span class="titulo"><h3><?php echo $registre['titular'];?></h3></span>
							<span class="descripcion">
								<p><?php echo $registre['noticia'];?></p>
							</span>
							<br>									
							<h5><span class="autor"><?php echo ucwords($registre['autor']);?>,&nbsp; <?php echo formatearFecha($registre['data']);?>.</span></h5>
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
			else
			{
				echo "<h3 style='color:red;text-align:center;padding:50px 0'>";
                	echo "¡ No se ha encontrado ninguna noticia relacionada con: \"".$_REQUEST['textobusca'] ."\" !";
            	echo "</h3>";
				 
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