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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head>
	<body>
		<noscript>Disculpe, su navegador no soporta JavaScript!</noscript>
		<!----------------------------------CABECERA------------------------------------------------>
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
		
		<!------------------------------------MODIFICAR NOTICIA------------------------------------>
		<?php

			//Inicializa variables
			$titulo = $contenido = $nombreFichero = $nombre = $data = $registre = $id = "";
			$tituloError = $ficheroError = $autorError = $contenidoError = "";
			$salir=true;
			$nombre=$usuario;

			if(isset($_REQUEST["modificar"])) 
			{	
				
				if (!empty($registre=buscaNoticia($_REQUEST["id"])))
				{
					$id=$registre['idnoticia'];
					$titulo=$registre['titular'];
					$contenido=$registre['noticia'];
					$nombreFichero=$registre['foto'];
					$nombre=ucwords($registre['autor']);
					$data=$registre['data'];
					$active=$registre['activo'];
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
					if (!preg_match("/^[a-zA-Z\. ,áéíóúAÉÍÓÚÑñ0123456789\¿\?\!\¡]*$/",$titulo)) 
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
				$active = (!isset($_REQUEST["activo"])) ? 0 : 1;
				
				if ($salir)
				{
					
					if (actualizarNoticia($_REQUEST["id"],$_REQUEST["titulo"],$_REQUEST["contenido"],$_REQUEST["fichero"],$active))
					{
						//header("Location: look-listado.php");
						echo "<script> window.location='look-listado.php'; </script>";

					}
				}
			}
			if (!$salir || !isset($_REQUEST["enviar"]))
			{
		?>
				<div class="recuadronoticia">   
					<div id="registronoticia" >
						<h1>Edición noticia:</h1>
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
							<br>
							<?php
								if (validarTipoUsuario($usuario,'admin'))
								{
									if ($active==1)
									{
										echo "<span class='activar'>Activar artículo: <input class='rr' type='checkbox' name='activo' checked></span>";
									}
									else
									{
										echo "<span class='activar'>Activar artículo: <input class='rr' type='checkbox' name='activo' ></span>";
									}
								}
							?>
							<br><hr>
							<button type="submit" name="enviar" class="btn btn-success" value="Enviar">Guardar noticia</button>
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#imatge">Ver fotografía</button>
						</form>
					</div>
				</div>
			<?php
			}
		?>
		<!---------------------------------FOTO------------------------------------------------------>
		<div id="imatge" class="modal fade" role="dialog">    
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<img src='../img/look-22.png' width='40%'>
					<br><br>
					<h5 class="modal-title" style="text-align:center;"><?php echo $titulo;?></h5>
				</div>
				<div class="modal-body">
					<img src='<?php echo $nombreFichero;?>' style="display:block;margin:auto;">
				</div>
				<div class="modal-footer">
					<button type="button" class="cancelbtn" data-dismiss="modal">Cerrar</button>
				</div>
			</div>    
		</div>   
		<!-----------------------------------PIE------------------------------------------------------>
		<?php
			$origen="look";
			include ('../html/pie.html');
		?>
	</body>
</html>

