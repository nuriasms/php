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
			$opcio="menu4";
			$barra="look";
			include ('../html/barra.html');
		?>
		<!----------------------------------CONSULTA NOTICIA------------------------------------>
		
		<span id="inicio"></span>
		<div class="bajar">
			<a href="#final" class="glyphicon glyphicon-chevron-down"></a>
		</div>
		<!----------------------------------------CARGAR DATOS----------------------------->
		<?php		
			$con = conectaBBDD();
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
						<td colspan="9" valign="middle" align="left"><?php echo $registre['titular'];?></td>
						<td colspan="2" valign="middle" align="left"><?php echo $registre['data'];?></td>
						<td colspan="3" valign="middle" align="left"><?php echo ucwords($registre['autor']);?></td>				
						<!--td><a href='editar.php?id=$registre[id]'><button type='button' class='btn btn-default'><span class='glyphicon glyphicon-pencil'></span></button></a></td-->
						<td valign="middle" align="center"><a href='look-modificar.php?modificar&id=<?php echo $registre['idnoticia'];?>'><span class='glyphicon glyphicon-pencil'></span></a></td>
						<!--td valign="middle" align="center"><a href='#'><span class='glyphicon glyphicon-pencil'></span></a></td-->

						<!--td><a href='borrar.php?id=$registre[id]' onClick=\"return confirm('¿Estás seguro de que quiere eliminar este elemento?');\"><button type='button' class='btn btn-default'><span class='glyphicon glyphicon-trash'></span></button></a></td-->
						<!--td valign="middle" align="center"><a href='#' onClick=\"return confirm('¿Estás seguro de que quiere eliminar este elemento?');\"><span class='glyphicon glyphicon-trash'></span></a></td-->
						
						<td valign="middle" align="center"><a href="funcion-borrar.php?nom=<?php echo $registre['autor'];?>&id=<?php echo $registre['idnoticia'];?>&cas=1" onClick=\"return confirm('¿Estás seguro de que quiere eliminar este elemento?');\"><span class='glyphicon glyphicon-trash'></span></a></td>
						borrarNoticia($nom,$id,$cas)
					</tr>
				<?php
				}
				?>
				</table>
			</div>
		</div>
		<?php		
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