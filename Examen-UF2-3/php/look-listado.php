<?php
    session_start();
    require ('../php/funciones.php');
	$usuario=validarSesionAbierta();
	
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
			$origen="look";
			include ('../html/cabecera.html');
		?>
		<!---------------------------------BARRA NAVEGACIÓN------------------------------------------>
		<?php
			$opcio="menu4";
			$barra = (!validarTipoUsuario($usuario,'admin')) ? 'privado':'admin';
			include ('../php/barra.php');
		?>
		<!----------------------------------CONSULTA NOTICIA------------------------------------>
		<div class="bajar">
			<a href="#final" class="glyphicon glyphicon-chevron-down"></a>
		</div>
		<!----------------------------------------CARGAR DATOS----------------------------->
		<?php		
			$vacio = false;
			$con = conectaBBDD();
			//-----------------------------------------------------------------------
			if (!validarTipoUsuario($usuario,'admin'))
			{
				$sql = "SELECT COUNT(*) as total_noticies FROM noticies WHERE autor='$usuario'";
			}
			else
			{
				$sql = "SELECT COUNT(*) as total_noticies FROM noticies";
			}
			$resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
			$registre = mysqli_fetch_assoc($resultat);
			$total_filas = $registre['total_noticies'];				

			if ($total_filas > 0) 
			{
				$page = false;
				$NUM_ITEMS_BY_PAGE = 8;
			
				//examino la pagina a mostrar y el inicio del registro a mostrar
				if (isset($_REQUEST["page"])) 
				{
					$page = $_REQUEST["page"];
				}
			 
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

				//-----------------------------------------------------------------------------
				if (!validarTipoUsuario($usuario,'admin'))
				{
					$sql = "SELECT * FROM noticies WHERE autor='$usuario' ORDER BY data DESC LIMIT ".$start.", ".$NUM_ITEMS_BY_PAGE;
				}
				else
				{
					$sql = "SELECT * FROM noticies ORDER BY data DESC LIMIT ".$start.", ".$NUM_ITEMS_BY_PAGE;
				}
				$resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
		?>
				<div id="recuadrolistado">
					<div id="registrolistado" >
						<h3>Listado de noticias</h3>
						<hr>
						<table id="listadoNoticias">
							<tr>
								<th valign="middle" align="left">Ref.</th>
								<th colspan="8" valign="middle" align="left">Titular</th>
								<th colspan="2" valign="middle" align="left">Fecha</th>
								<th colspan="3" valign="middle" align="left">Autor</th>
								<th valign='middle' align='left'>Act.</th>
								<th></th>
								<th></th>
							</tr>
						<?php		
							while ($registre = mysqli_fetch_array($resultat, MYSQLI_ASSOC)) 
							{
						?>
							<tr>				
								<td valign="middle" align="left"><?php echo $registre['idnoticia'];?></td>						
								<td colspan="8" valign="middle" align="left"><?php echo $registre['titular'];?></td>
								<td colspan="2" valign="middle" align="left"><?php echo $registre['data'];?></td>
								<td colspan="3" valign="middle" align="left"><?php echo ucwords($registre['autor']);?></td>				
								<td valign="middle" align="center"><span <?php echo(!$registre['activo']) ? "class='glyphicon glyphicon-remove rojo' title='Artículo inactivo'" : "class='glyphicon glyphicon-ok verde' title='Articulo activo'"; ?> ></span></td>
								<td valign="middle" align="center"><a href='look-modificar.php?modificar&id=<?php echo $registre['idnoticia'];?>'><span class='glyphicon glyphicon-pencil' title='Editar artículo'></span></a></td>
								<td valign="middle" align="center"><a href="borrar.php?nom=<?php echo $registre['autor'];?>&id=<?php echo $registre['idnoticia'];?>&cas=1" onClick="return confirm('¿Estás seguro de que quiere eliminar este elemento?')"><span class='glyphicon glyphicon-trash' title='Borrar artículo'></span></a></td>
							</tr>
						<?php
							$vacio = true;
							}
						?>
						</table>
					</div>
				</div>
		<?php	
				echo '<nav>';
				echo '<ul class="pagination">';
			
				if ($total_pages > 1) {
					if ($page != 1) {
						echo '<li class="page-item"><a class="page-link" href="look-listado.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
					}
			
					for ($i=1;$i<=$total_pages;$i++) {
						if ($page == $i) {
							echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
						} else {
							echo '<li class="page-item"><a class="page-link" href="look-listado.php?page='.$i.'">'.$i.'</a></li>';
						}
					}
			
					if ($page != $total_pages) {
						echo '<li class="page-item"><a class="page-link" href="look-listado.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
					}
				}
				echo '</ul>';
				echo '</nav>';
			}
			if (!$vacio)
			{
				echo "<h3 style='color:red;text-align:center;padding:50px 0'>";
                	echo "No se ha encontrado ninguna noticia.";
            	echo "</h3>";
				 
			}
			mysqli_close($con);
		?>

		<div class="subir">
			<a href="#inicio" class="glyphicon glyphicon-chevron-up"></a>
		</div>		
		<span id="final"></span>
		
		<!-----------------------------------PIE------------------------------------------------------>
		<?php
			$origen="look";
			include ('../html/pie.html');
		?>
	</body>
</html>