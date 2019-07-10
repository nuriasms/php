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
			$opcio="menu3";
			$barra="look";
			include ('../html/barra.html');
		?>
		<!-------------------------------------------ALTA NOTICIA------------------------------------>
		<?php

			//Inicializa variables
			$titulo = $contenido = $nombreFichero = $nombre = $data= "";
			$tituloError = $ficheroError = $autorError = $contenidoError = "";
			$salir=true;
			$nombre=$_COOKIE['usuario'];

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
					if (!preg_match("/^[a-zA-Z\. ,áéíóúAÉÍÓÚÑñ0123456789]*$/",$titulo)) 
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

				$nombreFichero=validarFichero();
				if (empty($nombreFichero))
				{
					$ficheroError = "No se ha podido subir el fichero";
					$salir=false;
				}

				if ($salir)
				{
					$data=date('Y-m-d');
					if (guardarNoticia($titulo,$contenido,$nombreFichero,$nombre,$data))
					{
						header("Location: look-alta-noticia.php");
					}
				}
			}
			if (!$salir || !isset($_REQUEST["enviar"]))
			{
		?>
				<div class="recuadronoticia">   
					<div id="registronoticia" >
						<h1>Nueva noticia:</h1>
						<hr>
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">  
							<label for="ftitulo">Titular: </label><input type="text" name="titulo" maxlength="200" size="72" value="<?php echo $titulo;?>" id="ftitulo">
							<span class="error"><?php echo $tituloError;?></span>
							<br><br>
							<label for="fcontenido">Contenido: </label><span class="error"><?php echo $contenidoError;?></span>
							<textarea type="text" name="contenido" rows="15" cols="80" id="fcontenido"><?php echo $contenido;?></textarea>
							<br><br>
							<label for="ffoto">Foto: </label>
							<input type="hidden" name="max_file_size" value="102400">
							<input type="file" name="fichero" id="ffoto">
							<span class="errorC"><?php echo $ficheroError;?></span>
							<br><br>
							<label for="fautor">Autor: &nbsp;&nbsp;&nbsp;<?php echo utf8_encode(ucwords($nombre));?></label>
							<span class="errorC"><?php echo $autorError;?></span>
							<br><br>
							<?php  $hoy = formatearFecha(date('d-m-Y'));?>
							<label for="ffecha">Fecha: &nbsp;&nbsp;&nbsp;<?php echo $hoy;?></label>
							<br><br><hr>
							<button type="reset" name="reset" class="btn btn-danger" value="Borrar">Limpiar datos</button>
							<button type="submit" name="enviar" class="btn btn-success" value="Enviar">Guardar noticia</button>
						</form>
					</div>
				</div>
			<?php
			}
		?>
		<!-----------------------------------PIE------------------------------------------------------>
		<?php
			include ('../html/pie.html');
		?>
	</body>
</html>