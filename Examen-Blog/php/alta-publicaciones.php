<?php
    session_start();
    require ('funciones.php');
    $usuario=validarSesionAbierta();

	//Inicializa variables
	$titulo = $contenido = $autor = $nombreFichero = "";
	$tituloError = $ficheroError = $autorError = $contenidoError = "";
	$salir=true;

	if(isset($_REQUEST["enviar"])) 
	{	
		if (empty($_REQUEST['titulo']))
		{
			$tituloError = "<br><br>La publicación requiere un titulo";
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
            if (strlen($titulo<10) || strlen($titulo>80))
            {
                $tituloError = "<br><br>El titulo debe tener más de 10 carácteres y menos de 80."; 
				$salir=false;
            }
		}
		if (empty($_REQUEST['contenido']))
		{
			$contenidoError = "<br><br>La publicación requiere una descripción.";
			$salir=false;
		} 
		else
		{
            $contenido = test_input($_REQUEST["contenido"]);
            if (strlen($contenido>500))
            {
                $contenidoError = "<br><br>la descripción admite un máximo de 500 carácteres."; 
				$salir=false;
            }
		}

		$nombreFichero=validarFichero();
		if (empty($nombreFichero))
		{
			$ficheroError = "No se ha podido subir el fichero";
			$salir=false;
        }
        
		if ($salir)
		{
			print("<p>Titular: ".$titulo."</p>");	
			print("<p>Contenido: ".$contenido."</p>");
			print("<img src='".$nombreFichero."'>");
		}
	}
	if (!$salir || !isset($_REQUEST["enviar"]))
	{
?>
	<div class="altaNoticia">
		<h2>Nueva publicación</h2>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">  
			<label for="ftitulo">Titulo: </label><input type="text" name="titulo" minlength="10" maxlength="80" size="80" value="<?php echo $titulo;?>" id="ftitulo">
			<span class="error"><?php echo $tituloError;?></span>
			<br><br>
			<label for="fcontenido">Descripción: </label><textarea type="text" name="contenido" rows="15" cols="80" maxlength="500" id="fcontenido">
<?php echo $contenido;?></textarea><span class="error"><?php echo $contenidoError;?></span>
			<br><br>
			<label for="ffoto">Foto: </label>
			<input type="hidden" name="max_file_size" value="102400">
			<input type="file" name="fichero" id="ffoto">
			<span class="error"><?php echo $ficheroError;?></span>
			<br><br><br>
			<input type="submit" name="enviar" value="Enviar">
		</form>
	</div>
    <?php
	}
?>