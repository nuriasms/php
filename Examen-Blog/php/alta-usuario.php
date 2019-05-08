<?php
	session_start();
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
	<link rel="stylesheet" href="../lib/css/bootstrap.min.css">
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../img/favicon.ico" type="image/x-icon">
	<script src="../lib/js/jquery.min.js"></script>
	<script src="../lib/js/bootstrap.min.js"></script>
	<script src="../js/funciones.js"></script>
    <title>Blog voleibol</title>
	<link rel="stylesheet" href="../css/style.css"> 
    <?php
		require ('funciones.php');
	?>
</head>
<body>
	<noscript>Disculpe, su navegador no soporta JavaScript!</noscript>
	<header>
		<h1>Blog voleibol</h1>
	</header>
	<!---------------------------------INICIO cuerpo a cambiar----------------------------------->
    <?php
        //Inicializa variables
        $usuario = $contrasena = $contrasena2 = $envio = $correo = $apellidos = $nacimiento = $edad = "";
        $usuarioError = $contrasenaError = $contrasena2Error = $correoError = $apellidosError = $nacimientoError = "";
		$salir=true;

		if(isset($_REQUEST["enviar"])) 
		{	

            if (empty($_REQUEST["usuario"])) 
			{
				$usuarioError = "Nombre usuario obligatorio";
				$salir=false;
			} 
			else 
            {
				$usuario = test_input($_REQUEST["usuario"]);
				// comprueba que lleva solo letras y espacios
				if (!preg_match("/^[a-zA-Z áéíóúÁÉÍÓÚÑñàèòÀÈÒçÇ·\-]*$/",$usuario))
               	{ 
					$usuarioError = "Solo se admiten letras y espacios en blanco";
				  	$salir=false;
				}
			}
			
			if (empty($_REQUEST["apellidos"])) 
			{
				$apellidosError = "Apellidos obligatorios";
				$salir=false;
			} 
			else 
			{
				$apellidos = test_input($_REQUEST["apellidos"]);
				// comprueba que lleva solo letras y espacios
				if (!preg_match("/^[a-zA-Z áéíóúÁÉÍÓÚÑñàèòÀÈÒçÇ·\-]*$/",$apellidos)) 
				{
				  $apellidosError = "Solo se admiten letras y espacios en blanco";
				  $salir=false;
				}
			}

			if (empty($_REQUEST["nacimiento"])) 
			{
				$nacimientoError = "fecha nacimiento obligatorio";
				$salir=false;
			} 
			else 
			{
				$edad = calculaEdad($_REQUEST["nacimiento"]);
				if ($edad < 18) 
				{
				  $nacimientoError = "Solo se permite el alta a mayores de edad";
				  $salir=false;
				}
				else
				{
					$nacimiento = $_REQUEST["nacimiento"];
				}
			}
			
			if (empty($_REQUEST["correo"])) 
			{
				$correoError = "Correo obligatorio";
				$estado=false;
			} 
			else 
			{
				$correo = test_input($_REQUEST["correo"]);
				// Comprueba que el formato es correcto
				if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) 
				{
				  $correoError = "Formato de correo erróneo";
				  $estado=false; 
				}
			}

            if (empty($_REQUEST['contrasena']))
            {
				$contrasenaError = "Contraseña obligatoria. Longitud de 6 a 8 carácteres";
				$salir=false;
			} 
			else 
			{ 
				$tmp = validarContrasena($_REQUEST['contrasena']);
				if (!empty($tmp))
				{
					$contrasenaError = "La contraseña ha de tener:".$tmp;
					$salir=false;
				}
				else
				{
					$contrasena = $_REQUEST['contrasena'];
				}
			}    

			if (empty($_REQUEST['contrasena2']))
            {
				$contrasena2Error = "Es obligatorio repetir la contraseña";
				$salir=false;
			} 
			else 
			{
				if (($_REQUEST['contrasena']) != ($_REQUEST['contrasena2']))
				{ 
					$contrasena2Error = "Las contraseñas no coinciden, vuelva a introducirlas";
					$salir=false;
				}
			}  
				
			if ($salir==true)
			{
				$envio="Envio correcto";
				header("Location: ../index.php");
				exit;
			}
		}		
		?>    
    
        <div id="registro">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div id="registroCab"> 
					<img src="../img/jugadora.png" alt="Avatar" >
					<h2>Registro de alta</h2>	
                </div>  
                <div id="registroCuerpo"> 
					<hr>
					<span class="errorReg"><?php echo $usuarioError;?></span>
					<br>					
					<label>Nombre usuario: </label><input type="text" name="usuario" size="25" value="<?php echo $usuario;?>">
					<br><br>
					<span class="errorReg"><?php echo $apellidosError;?></span>
					<br>
					<label>Apellidos: </label><input type="text" name="apellidos" size="50" value="<?php echo $apellidos;?>">
					<br><br>
					<span class="errorReg"><?php echo $nacimientoError;?></span>
  					<br>
					<label>Fecha nacimiento: </label><input type="date" name="nacimiento" value="<?php echo $nacimiento;?>">
					<br><br>
					<span class="errorReg"><?php echo $correoError;?></span>
  					<br>
					<label>Correo: </label><input type="email" name="correo" size="25" value="<?php echo $correo;?>">
					<br><br>
					<span class="errorReg"><?php echo $contrasenaError;?></span>
                    <br>
					<label>Contraseña: </label><input type="password" name="contrasena" size="25" minlength="6" maxlength="8" value="<?php echo $contrasena;?>">	
					<br><br>
					<span class="errorReg"><?php echo $contrasena2Error;?></span>
					<br>	
					<label>Repite contraseña: </label><input type="password" name="contrasena2" size="25" minlength="6" maxlength="8">	
					<br><br>
					<hr>                    
					<label>Recordar usuario</label><input type="checkbox" name="recordar">
					<br><br>
					<input type="submit" name="enviar" value="Alta usuario"><span class="verde"><?php echo $envio;?></span>
					<br><br>
					<p><i>Todos los campos son obligatorios para el alta de un nuevo usuario</i></p>
                </div>				
			</form>
		</div>
	<!-------------------------------FIN cuerpo a cambiar-----------------------------------> 
	<footer>
		<ul id="redes">
			<li ><a href="https://es-es.facebook.com" target="blank"><img src="../img/a-facebook1.png" id="facebook"></a></li>
			<li><a href="https://twitter.com/?lang=e" target="blank"><img src="../img/a-twitter1.png" id="twitter"></a></li>
			<li><a href="mailto:voleibol@gmail.com"><img src="../img/a-correo.png" id="correu"></a></li>
		</ul>
		<div id="derecha">
	   	 	<a href="#" data-toggle="modal" data-target="#myModal">Condiciones legales del servicio</a>	
	   	 	<p id="copyright">&copy; 2019 Blog Voleibol All Rights Reserved.</p>
      	</div>		
	</footer>
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
		    <div class="modal-content">
		    	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		        	<h4 class="modal-title">Información del servicio</h4>
		      	</div>
		    	<div class="modal-body">
		    	    <h2>Condiciones legales del servicio</h2>
            	    <p><i>El usuario de la web se compromete a hacer un uso de ésta y de sus contenidos y servicios de acuerdo con los términos y condiciones, así como a respetar y cumplir en todo momento la ley y cualquier disposición normativa vigente y aplicable. <br><br>
            	    Queda prohibido el uso y acceso a la web mediante cualquier aplicación, programa informático o sistema análogo que pueda dañar o obstaculizar su funcionamiento normal, incluyendo la alteración, la eliminación o el bloqueo de los contenidos y servicios que se ofrece, o de cualquier otro mecanismo que les pueda afectar, especialmente aquellos que puedan suponer la privación del acceso y uso en la web, o cualquier parte de ésta, a terceros.</i></p>
            	    <h2>Información básica de privacidad</h2>
            	    <p><i>Queda igualmente prohibido el acceso a la web mediante programas u otros mecanismos informáticos que, de forma voluntaria o involuntaria, puedan resultar en una sobrecarga de los recursos utilizados por la compañía para mantener la web accesible al público y / o que permitan un acceso no autorizado los apartados de la web no accesibles al público en general o al sistema informático en el que se encuentra alojada; de manera que puedan introducir virus u otros programas maliciosos o scripts que causen errores en el sistema informático mencionado o en el funcionamiento de la web.</i></p>
		    	</div>
		    	<div class="modal-footer">
		    	    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		    	</div>
			</div>
		</div>
	</div>  
</body>
</html>