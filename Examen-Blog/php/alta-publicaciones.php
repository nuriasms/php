<?php
    session_start();
    require ('funciones.php');
    $usuario=validarSesionAbierta();  
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="description" content="Blog dedicada a la promoción de un deporte de equipo como es el VOLEIBOL.">
		<meta name="keywords" content="voleibol, saque, bloqueo, remate, libero, central, punta, opuesto, barillas, red, campo, receptor, zaguero, entrenador, club, arbitro, balón">
		<meta http-equip="Expires" content="no-cache">
		<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
		<link rel="icon" href="../img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="../lib/css/bootstrap.min.css">
		<script src="../lib/js/jquery.min.js"></script>
		<script src="../lib/js/bootstrap.min.js"></script>
		<script src="../js/funciones.js"></script>
		<title>Blog voleibol</title>
		<link rel="stylesheet" href="../css/style.css"> 
	</head>
	<body>
    <noscript>Disculpe, su navegador no soporta JavaScript!</noscript>
		<span id="inicio"></span>
		<?php
			include ('../html/cabecera.html');
			include ('../html/barra.html');
		?>
		
		<!---------------------------------INICIO -----------------------------------> 
		<div class="container">
		<script>
			document.getElementById("menu1").className="inactive";
			document.getElementById("menu2").className="active";
		</script>
		<?php
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
					if ((strlen($titulo)<10) || (strlen($titulo)>50))
					{
						$tituloError = "<br><br>El titulo debe tener más de 10 carácteres y menos de 50."; 
						$salir=false;
					}
				}
				if (empty($_REQUEST['contenido']))
				{
					$contenidoError = "<br>La publicación requiere una descripción.";
					$salir=false;
				} 
				else
				{
					$contenido = test_input($_REQUEST["contenido"]);
					$contenido=str_replace("\r\n"," ",$contenido);
					if (!preg_match("/^[a-zA-Z0-9\. áéíóúÁÉÍÓÚÑñàèòÀÈÒçÇ,;]*$/",$contenido))
					{ 
						$contenidoError = "<br><br>Solo se admiten letras y espacios en blanco";
						$salir=false;
					}
					if ((strlen($contenido)>500))
					{
						$contenidoError = "<br><br>La descripción admite un máximo de 500 carácteres."; 
						$salir=false;
					}
				}

				$nombreFichero=validarFichero();
				if (empty($nombreFichero))
				{
					$ficheroError = "<br><br>No se ha podido subir el fichero";
					$salir=false;
				}
				
				if ($salir)
				{
					print("<p>Titular: ".$titulo."</p><br>");	
					print("<p>Contenido: ".$contenido."</p><br>");
					print("<img src='".$nombreFichero."'><br>");
				}
			}
			if (!$salir || !isset($_REQUEST["enviar"]))
			{
		?>
			<div class="altaNoticia">
				<h2>Nueva publicación</h2>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">  
					<br>	
					<label for="ftitulo">Titulo: </label><input type="text" name="titulo" minlength="10" maxlength="50" size="50" value="<?php echo $titulo;?>" id="ftitulo">
					<p class="errorNoticia"><?php echo $tituloError;?></p>
					<br>
					<label for="fcontenido">Descripción: </label><textarea type="text" name="contenido" rows="10" cols="50" maxlength="500" id="fcontenido"><?php echo $contenido;?></textarea>
					<p class="errorNoticia"><?php echo $contenidoError;?></p>
					<br>
					<label for="ffoto">Foto: </label>
					<input type="hidden" name="max_file_size" value="102400">
					<input type="file" name="fichero" id="ffoto">
					<p class="errorNoticia"><?php echo $ficheroError;?></p>
					<br><br>
					<button type="submit" class="btn btn-success btn-lg btn-sub" name="enviar" >Enviar publicación</button>
					<button type="reset" class="btn btn-danger btn-lg btn-res" >Borrar información</button>
					<br><br>
				</form>
			</div>
			<?php
			}
		?>
		</div>
		<!---------------------------------FIN --------------------------------------> 
		<?php
			include ('../html/pie.html');
		?>
	</body>
</html>