<?php
    session_start();
    require ('../php/funciones.php');
	//$usuario=validarSesionAbierta();  //pasa a ser publico por lo que se quita el control
	$usuario=validarColaborador(); 

    if(isset($_REQUEST["cerrar"])) cerrarSesion();
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
			$origen="consulta";
			include ('../html/cabecera.html');
		?>
		<!---------------------------------BARRA NAVEGACIÓN------------------------------------------>
		<?php
			$opcio="menu2";
			if (!validarTipoUsuario($usuario,'admin'))
			{
				$barra = (!empty($usuario)) ? 'privado':'publico';
			}
			else
			{
				$barra="admin";
			}
			include ('../php/barra.php');
		?>
		<!--------------------------------SELECCION Noticias----------------------------------------->
		<?php

		if(isset($_REQUEST["seleccionar"])) 
		{	
			if(isset($_REQUEST['articulos'])){
				$lista = $_REQUEST['articulos'];
				// dades de configuració
				$con = conectaBBDD();
				foreach($lista as $idart)
				{
					$sql="insert into pdf (idnoticia) values ('$idart')";
					$consulta = mysqli_query($con, $sql) or die('Consulta fallida: ' . mysqli_error($con));
				}
				$sql = "SELECT COUNT(*) as total FROM pdf";
				$resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
				$registre = mysqli_fetch_assoc($resultat);
				$total = $registre['total'];	
				mysqli_close($con);
			}
			else{
				$total = 0;
			}
			echo "<script> window.location='pdf.php?valor=$total'; </script>";
			//echo "<script> window.location='pdf.php?valor='".$total."'; </script>";
			//header("Location: pdf.php");
		}
		?>
		<!---------------------------------BARRA BUSQUEDA------------------------------------------>
		<nav class="navbar navbar-default">		 
			
					<form class="navbar-form navbar-right busquedadreta">
						<!--input type="text" class="form-control" placeholder="Buscar texto en pantalla" name="buscatexto">
						<button type="button" class="btn btn-default" onclick="buscar(document.all.buscatexto.value)"><span class="glyphicon glyphicon-search"></span></button-->
						<input type="text" class="form-control" placeholder="Buscar noticias de ..." name="textobusca">
	      				<button type="submit" class="glyphicon glyphicon-search redondo" name="buscar" title="Busca noticias que contengan el texto"></button>
					</form>
					<div class="izquierdatop">
					<form method="get">  
						<!--a href="pdf.php" ><button type='button' class='glyphicon glyphicon-file redondo' title="Crear PDF con las noticias"></button></a-->
						<button type="submit" name="seleccionar" class='glyphicon glyphicon-file redondo' title="Crear PDF con las noticias" value="seleccionar"></button>
						<?php	
							if (validarTipoUsuario($usuario,'admin') || validarTipoUsuario($usuario,'basic'))
							{
								$correo= buscaCorreo($usuario);
						?>						
								<a href="enviar-pdf.php?nom=<?php echo $usuario;?>&url=../doc/Listado_noticias.pdf&fitxer=Listado_noticias.pdf&correo=<?php echo $correo['correu'];?>" ><button type='button' class='glyphicon glyphicon-envelope redondo' title="Enviar PDF de noticias por correo"></button></a>																	
						<?php	
							}
						?>
					</div>
					 
	    	
		</nav>
		<!-------------------------------------------CONSULTA NOTICIA------------------------------------>
		
		<div class="linea">
			<h2>NOTICIAS RECIENTES</h2>
			<br>
		</div>
		
		<div class="bajar">
			<a href="#final" class="glyphicon glyphicon-chevron-down"></a>
		</div>
		<!----------------------------------------CARGAR DATOS----------------------------->
		<?php
			$fecha = "";
			$vacio = false;
			$con = conectaBBDD();

			if (isset($_REQUEST["buscar"]))
			{
				$sql = "SELECT COUNT(*) as total_noticies FROM noticies WHERE activo=1 AND UPPER(titular)  COLLATE utf8_spanish_ci LIKE UPPER('%$_REQUEST[textobusca]%') OR UPPER(noticia) COLLATE utf8_spanish_ci LIKE UPPER('%$_REQUEST[textobusca]%') OR UPPER(autor) COLLATE utf8_spanish_ci LIKE UPPER('%$_REQUEST[textobusca]%') OR UPPER(data) LIKE UPPER('%$_REQUEST[textobusca]%')";
			}
			else
			{
				$sql = "SELECT COUNT(*) as total_noticies FROM noticies WHERE activo=1";
			}
			$resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
			$registre = mysqli_fetch_assoc($resultat);
			$total_filas = $registre['total_noticies'];				

			//-------------------------------------
			if ($total_filas > 0) 
			{
				$page = false;
				$NUM_ITEMS_BY_PAGE = 4;
			
				//examino la pagina a mostrar y el inicio del registro a mostrar
				if (isset($_REQUEST["page"])) $page = $_REQUEST["page"];
			 
				if (!$page)
				{
					$start = 0;
					$page = 1;
				} 
				else 
				{
					$start = ($page - 1) * $NUM_ITEMS_BY_PAGE;
				}
				//calculo el total de paginas
				$total_pages = ceil($total_filas / $NUM_ITEMS_BY_PAGE);
				
				//-----------------------------------
			
				if (isset($_REQUEST["buscar"]))
				{
					$sql = "SELECT * FROM noticies WHERE activo=1 AND UPPER(titular)  COLLATE utf8_spanish_ci LIKE UPPER('%$_REQUEST[textobusca]%') OR UPPER(noticia) COLLATE utf8_spanish_ci LIKE UPPER('%$_REQUEST[textobusca]%') OR UPPER(autor) COLLATE utf8_spanish_ci LIKE UPPER('%$_REQUEST[textobusca]%') OR UPPER(data) LIKE UPPER('%$_REQUEST[textobusca]%') ORDER BY data DESC LIMIT ".$start.", ".$NUM_ITEMS_BY_PAGE;
				}
				else
				{				
					$sql = "SELECT * FROM noticies WHERE activo=1 ORDER BY data DESC LIMIT ".$start.", ".$NUM_ITEMS_BY_PAGE;
				}

				$resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
			
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
						<?php	
							if (validarTipoUsuario($usuario,'admin') || ($usuario==$registre['autor']))
							{
						?>
								<a href="borrar.php?nom=<?php echo $registre['autor'];?>&id=<?php echo $registre['idnoticia'];?>&cas=2" ><button type='button' class='glyphicon glyphicon-trash redondo' title='Borrar articulo' onClick="return confirm('¿Estás seguro de que quiere eliminar este elemento?')" ></button></a>
								<a href='look-modificar.php?modificar&id=<?php echo $registre['idnoticia'];?>'><button type='button' class='glyphicon glyphicon-pencil redondo' title='Editar articulo'></button></a>

						<?php
							}
						?>
							<span class="pdf">Seleccionar para PDF <input type="checkbox" name="articulos[]" value="<?php echo $registre['idnoticia']; ?>"></span>
							</div>	
							<div class="articuloFoto">
								<img src="<?php echo $registre['foto'];?>" width="300px" alt="Foto no disponible" align="middle">
							</div>
					</div>
					<div class="limpiar"><br></div>
			<?php
					$vacio = true;
				}
				echo '</form>';
				echo '<nav>';
				echo '<ul class="pagination">';
			
				if ($total_pages > 1) {
					if ($page != 1) {
						echo '<li class="page-item"><a class="page-link" href="look-consulta.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
					}
			
					for ($i=1;$i<=$total_pages;$i++) {
						if ($page == $i) {
							echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
						} else {
							echo '<li class="page-item"><a class="page-link" href="look-consulta.php?page='.$i.'">'.$i.'</a></li>';
						}
					}
			
					if ($page != $total_pages) {
						echo '<li class="page-item"><a class="page-link" href="look-consulta.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
					}
				}
				echo '</ul>';
				echo '</nav>';
			}
			if (!$vacio)
			{
				echo "<h3 style='color:red;text-align:center;padding:50px 0'>";
                	echo "No se ha encontrado ninguna noticia relacionada con: <br><br>\"".$_REQUEST['textobusca'] ."\"";
            	echo "</h3>";
				 
			}
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
			$origen="consulta";
			include ('../html/pie.html');
		?>
	</body>
</html>