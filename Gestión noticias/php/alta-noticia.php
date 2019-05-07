<?php
    session_start();
    require ('funciones.php');
    $usuario=validarSesionAbierta();  
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>GN-Alta noticias</title>
        <link rel="stylesheet" href="../css/style.css">
			
	</head>
	<body>
		<?php
			//Inicializa variables
			$titulo = $contenido = $autor = $nombreFichero = "";
			$tituloError = $ficheroError = $autorError = $contenidoError = "";
			$salir=true;

			if(isset($_REQUEST["enviar"])) 
			{	
				if (empty($_REQUEST['titulo']))
				{
					$tituloError = "<br><br>La noticia requiere un titular";
					$salir=false;
				} 
				else 
				{
					$titulo = test_input($_REQUEST["titulo"]);
					// comprueba que lleva solo letras y espacios
					if (!preg_match("/^[a-zA-Z\. ,áéíóúAÉÍÓÚÑñ]*$/",$titulo)) 
					{
						$tituloError = "<br><br>Solo se admiten letras y espacios en blanco"; 
						$salir=false;
					}
				}

				if (empty($_REQUEST['contenido']))
				{
					$contenidoError = "<br><br>La noticia requiere un contenido";
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

				if (empty($_REQUEST["autor"]))
				{
					$autorError = "La noticia requiere el autor";
					$salir=false;
				} 
				else 
				{
					$autor = test_input($_REQUEST["autor"]);
					// comprueba que lleva solo letras y espacios
					if (!preg_match("/^[a-zA-Z\. ,áéíóúAÉÍÓÚÑñ]*$/",$autor)) 
					{
					  $autorError = "Solo se admiten letras y espacios en blanco";
					  $salir=false;
					}
				}

				if ($salir)
				{
					print("<p>Titular: ".$titulo."</p>");	
					print("<p>Contenido: ".$contenido."</p>");
					print("<img src='".$nombreFichero."'>");
					print("<p>Autor: ".$autor."</p>");
					print("<p>Fecha: ".$_REQUEST["fecha"]."</p>");
				}
			}
			if (!$salir || !isset($_REQUEST["enviar"]))
			{
		?>
		<div class="altaNoticia">
			<h2>Alta noticias</h2>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">  
				<label for="ftitulo">Titular noticia: </label><input type="text" name="titulo" maxlength="78" size="78" value="<?php echo $titulo;?>" id="ftitulo">
				<span class="error"><?php echo $tituloError;?></span>
				<br><br>
				<label for="fcontenido">Contenido noticia: </label><textarea type="text" name="contenido" rows="15" cols="80" id="fcontenido">
<?php echo $contenido;?></textarea><span class="error"><?php echo $contenidoError;?></span>
				<br><br>
				<label for="ffoto">Foto noticia: </label>
				<input type="hidden" name="max_file_size" value="102400">
				<input type="file" name="fichero" id="ffoto">
				<span class="error"><?php echo $ficheroError;?></span>
				<br><br>
				<label for="fautor">Autor: </label><input type="text" name="autor" maxlength="30" size="30" value="<?php echo $autor;?>" id="fautor">
				<span class="error"><?php echo $autorError;?></span>
				<br><br>
				<?php  $hoy = formatearFecha(date('d-m-Y'));?>
				<label for="ffecha">Fecha noticia: </label><input type="text" name="fecha" maxlength="30" size="30" value="<?php echo $hoy?>" readonly="readonly">
				<br><br><br>
				<input type="submit" name="enviar" value="Enviar">
			</form>
		</div>
        <?php
		}
		?>
	</body>
</html>