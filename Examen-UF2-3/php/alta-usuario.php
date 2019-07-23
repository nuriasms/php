<?php
	session_start();
	require ('funciones.php');
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
	<!---------------------------------INICIO ---------------------------------->
    <?php
        //Inicializa variables
        $usuario = $contrasena = $contrasena2 = $envio = $correo = $nacimiento = $id = "";
        $usuarioError = $contrasenaError1 = $contrasenaError2 = $contrasena2Error = $correoError = $nacimientoError = "";
		$salir = $respuesta = true;

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
					$usuarioError = "Solo admite letras y espacios en blanco";
				  	$salir=false;
				}
			}
			

			if (empty($_REQUEST["nacimiento"])) 
			{
				$nacimientoError = "Fecha nacimiento obligatorio";
				$salir=false;
			} 
			else 
			{
				$edad = calculaEdad($_REQUEST["nacimiento"]);
				if ($edad < 18) 
				{
				  $nacimientoError = "Debe ser mayor de edad";
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
				$contrasenaError1 = "Contraseña obligatoria";
				$contrasenaError2 = "Longitud de 4 a 8 carácteres";
				$salir=false;
			} 
			else 
			{ 
				$tmp = validarContrasena($_REQUEST['contrasena']);
				if (!empty($tmp))
				{
					$contrasenaError1 = "La contraseña ha de tener:".$tmp;
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
					$contrasena2Error = "Contraseñas diferentes";
					$salir=false;
				}
			}  
				
			if ($salir==true)
			{
				$respuesta=altaUsuario($usuario,$nacimiento,$correo,$contrasena,$_REQUEST['nivel']);
				if (!$respuesta)
				{
					$envio="Error en alta";
					header("Location: ../index.php");
					exit;
				}
				else{
					$envio="Alta correcta";
					guardarCookie($_REQUEST['usuario'],$_REQUEST['contrasena'],$_REQUEST['recordar']);
					if (iniciarSesion($_REQUEST['usuario'],$_REQUEST['contrasena']))
					{
						header("Location: look.php");
						exit;
					}
				}
			}
		}		
		?> 
		<div class="recuadro">   
		<div class="revista">
		</div>
        <div id="registro">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <div id="registroCab"> 
					<h3>REGISTRO DE ALTA</h3>	
                </div>  
                <div id="registroCuerpo"> 
					<hr>
					<!--input type="hidden" name="id" value="<?php //echo $id;?>"-->
					<input type="hidden" name="nivel" value="basic">
					<span class="errorReg"><?php echo $usuarioError;?></span>
					<br>					
					<label>Nombre usuario: </label><input type="text" name="usuario" maxlength="30" value="<?php echo $usuario;?>">
					<br><br>
					<span class="errorReg"><?php echo $nacimientoError;?></span>
  					<br>
					<label>Fecha nacimiento: </label><input type="date" name="nacimiento" value="<?php echo $nacimiento;?>">
					<br><br>
					<span class="errorReg"><?php echo $correoError;?></span>
  					<br>
					<label>Correo: </label><input type="email" name="correo" maxlength="30" value="<?php echo $correo;?>">
					<br><br>
					<span class="errorReg"><?php echo $contrasenaError1;?></span>
					<br>
					<span class="errorReg"><?php echo $contrasenaError2;?></span>
                    <br>
					<label>Contraseña: </label><input type="password" name="contrasena" minlength="4" maxlength="8" value="<?php echo $contrasena;?>">	
					<br><br>
					<span class="errorReg"><?php echo $contrasena2Error;?></span>
					<br>	
					<label>Repite contraseña: </label><input type="password" name="contrasena2" minlength="4" maxlength="8">	
					<br><br>
					<hr>                    
					<label>Recordar usuario</label><input type="checkbox" name="recordar">
					<br><br>
					<input type="submit" name="enviar" value="Alta usuario"><span class="verde"><?php echo $envio;?></span>
					<br><br><br>
					<span class="nota">Todos los campos son obligatorios para el alta de un nuevo usuario</span>
                </div>				
			</form>
		</div>
		</div>
	<!-------------------------------FIN -----------------------------------> 
	</body>
</html>