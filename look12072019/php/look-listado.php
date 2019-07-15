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
			$opcio="menu4";
			$barra="look";
			include ('../html/barra.html');
		?>
		<!------------------------------------CONSULTA NOTICIA------------------------------------>
		
		<span id="inicio"></span>
		<div class="bajar">
			<a href="#final" class="glyphicon glyphicon-chevron-down"></a>
		</div>
		<!----------------------------------------CARGAR DATOS----------------------------->
		<?php		
			$con = conectaBBDD();
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