<?php
    session_start();
    require ('funciones.php');
    $usuario=validarSesionAbierta();  
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Menu</title>
        <link rel="stylesheet" href="../css/style.css">
			
	</head>
	<body>
        <h2>Menú noticias</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">  
  			<label for="ftitulo">Titular noticia: </label><input type="text" name="titulo" value="<?php echo $titulo;?>" id="ftitulo">
  			<span class="error"><?php echo $tituloError;?></span>
  			<br><br>
			<label for="fcontenido">Contenido noticia: </label><textarea type="text" name="contenido" rows="10" cols="80" id="fcontenido">
            <?php echo $contenido;?></textarea>
            <br><br>
            <label for="ffoto">Foto noticia: </label>
			<input type="hidden" name="max_file_size" value="102400">
			<input type="file" name="foto" id="ffoto">
  			<span class="error"><?php echo $fotoError;?></span>
			<br><br>
            <label for="fautor">Autor: </label><input type="text" name="autor" value="<?php echo $autor;?>" id="fautor">
  			<span class="error"><?php echo $autorError;?></span>
  			<br><br>
            <?php  $hoy = formatearFecha(date('d-m-Y'));?>
            <label for="ffecha">Fecha noticia: </label><input type="text" name="fecha" value="<?php echo $hoy?>" readonly="readonly">

  			<br><br>
			<br><br><br>
			<input type="submit" name="enviar" value="Enviar">
		</form>
       
        
	</body>
</html>