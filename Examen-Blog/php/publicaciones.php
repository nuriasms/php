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
			include ('../html/cabecera-publica.html');
			include ('../html/barra.html');
		?>
		
		<!---------------------------------INICIO cuerpo a cambiar-----------------------------------> 
		<div class="container">
			<script>
				document.getElementById("menu1").className="active";
				document.getElementById("menu2").className="inactive";
			</script>
			<?php
				//Inicializa variables
				$comentario = $comentarioError = "";

				if(isset($_REQUEST["enviar"])) 
				{	
					if (empty($_REQUEST["comentario"])) 
					{
						$comentarioError = "Nombre usuario obligatorio";
					} 
					else 
					{
						$comentario = test_input($_REQUEST["comentario"]);
						// comprueba que lleva solo letras y espacios
						if (!preg_match("/^[a-zA-Z áéíóúÁÉÍÓÚÑñàèòÀÈÒçÇ·\-]*$/",$comentario))
						{ 
							$comentarioError = "Solo se admiten letras y espacios en blanco";
						}
						if ((strlen($comentario)>250))
						{
							$comentarioError = "<br><br>El comentario admite un máximo de 250 carácteres."; 
							$salir=false;
						}
					}
				}  
			?>

			<div class="col-sm-12 publicacion">
				<a href="../php/alta-publicaciones.php">Alta publicaciones</a>
				<br>
				<h4><small>PUBLICACIÓN RECIENTE</small></h4>
				<hr>
				<span class="titulo"><h2>Mejorar tus habilidades de jugador, II parte</h2></span>
				<span class="descripcion">
					<p><strong>Aprende a realizar el servicio por encima de la cabeza.</strong> Si bien muchos de los mejores jugadores han perfeccionado el servicio con salto, uno simple por encima de la cabeza podría ser igual de eficaz. Mantente detrás de la línea de servicio, lanza la pelota a una altura cómoda por encima de tu cabeza y golpéala con la palma de la mano extendida sobre la red lo más fuerte que puedas. La pelota debe quedar dentro de los límites del lado contrario de la cancha. Si bien los servicios por debajo del hombro y los laterales colocan la pelota en juego, no son tan difíciles de devolver como los que se realizan por encima de la cabeza y además no son los favoritos para aprender.</p>
					<ul>
						<li><span><b>Practica tu saque.</b> Para ambos tipos de servicio, debes lanzar la pelota con la mano que usarás para golpearla y apuntar a la parte más baja de ella. No trates de golpearla con la palma de la mano sino con la parte del arco para lograr un servicio más preciso. Asegúrate de posicionarte y apuntar correctamente o la pelota saldrá desviada.</span></li>
						<li><span><b>Prueba aplicando fuerza.</b> ¿Qué es demasiado? ¿Qué es muy poco? Muy pronto tus músculos recordarán lo que funciona y podrás apuntar la pelota como si se tratara de una bala en una pistola.</span></li>
					</ul>
				</span>
				<img src="../img/saque-flotante.jpg">
				<h5><span class="glyphicon glyphicon-time"></span><span class="autor"> Mireia Martorell, 10 de mayo de 2019.</h5>
				<button type="button" name="cuenta" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-thumbs-up"></span></button><span> 14 </span>
				<br><br><br>
						
				<h4><small>PUBLICACIÓN RECIENTE</small></h4>
				<hr>
				<span class="titulo"><h2>Mejorar tus habilidades de jugador, I parte</h2></span>
				<span class="descripcion">
					<p><strong>Aprende a hacer pases y a recepcionar con precisión.</strong> Una de las primeras cosas que deberás aprender después de desarrollar tu servicio es a pasarle la pelota con eficacia a un jugador en la posición de colocación y así darle a tu equipo la mejor oportunidad para anotar un punto. Los mejores pases y colocadores pueden recuperar el control de la pelota eliminando su giro y elevándola lo suficiente como para darle tiempo al colocador de posicionarse debajo de ella.</p>
					<ul>
						<li><span><b>Desarrolla la forma correcta para hacer un pase y recepcionar.</b> Coloca las manos rectas en frente de ti y coloca una palma dentro de la otra utilizando el espacio entre tus codos y muñecas para guiar la pelota. Ahueca una mano y coloca la otra encima de ella. Junta tus pulgares para que miren hacia afuera en dirección opuesta a ti, pero sin cruzarlos.</span></li>
						<li><span><b>Al recepcionar la pelota,</b> deberás golpearla con la parte interior del antebrazo. Al principio será complicado, pero te permitirá tener una superficie plana y regular para que la pelota pueda rebotar. Practica tus pases de ida y vuelta con un compañero, tratando de colocar la pelota en el mismo lugar cada vez. Ni siquiera necesitas una red.</span></li>
					<ul>
				</span>
				<img src="../img/recepcion.gif">
				<h5><span class="glyphicon glyphicon-time"></span><span class="autor"> Núria Pons, 29 de abril de 2019.</h5>
				<button type="button" name="cuenta" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-thumbs-up"></span></button><span> 9 </span>
				<hr>

				<h4>Deja un comentario:</h4>
				<form role="form" method="post">
					<div class="form-group">
						<textarea name="comentario" class="form-control" rows="3" maxlength="250"><?php echo $comentario;?></textarea><span class="error"><?php echo $comentarioError;?></span>
					</div>
					<button type="submit" name="enviar" class="btn ">Enviar</button>
				</form>
				<br><br>     
				<p><span class="badge">2</span> Comentarios:</p>
				<br>    
				<div class="row">
					<div class="col-sm-2 text-center">
						<img src="../img/hombre.jpg" class="img-circle" height="65" width="65" alt="Avatar">
					</div>
					<div class="col-sm-10">
						<h4>Edgar <small>01 mayo 2019, 9:12 PM</small></h4>
						<p>¡Buen trabajo! Estoy haciendo los ejercicios recomendaros y he empezado a notar la mejoria en mi juego.</p>
						<br>
					</div>
					<div class="col-sm-2 text-center">
						<img src="../img/mujer.png" class="img-circle" height="65" width="65" alt="Avatar">
					</div>
					<div class="col-sm-10">
						<h4>Shaila <small>10 mayo 2019, 8:25 PM</small></h4>
						<p>Estoy esperando el próximo articulo. Me gustaria que fuesen más frecuentes. Me gusta mucho el voleibol.</p>
						<br>
					</div>
				</div>
			</div>
			<a href="#inicio">Ir al inicio</a><br><br>
		</div>
		<!---------------------------------FIN --------------------------------------> 
		<?php
			include ('../html/pie.html');
		?>
	</body>
</html>