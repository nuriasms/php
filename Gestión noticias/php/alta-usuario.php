<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestión noticias-Registrar</title>
	<link rel="stylesheet" href="../css/style.css"> 
    <?php
			require ('funciones.php');
	?>
</head>
<body>
	<noscript>Disculpe, su navegador no soporta JavaScript!</noscript>
    <?php
        //Inicializa variables
        $usuario = $contrasena = $contrasena2 = $envio = $edad = $correo = "";
        $usuarioError = $contrasenaError = $contrasena2Error = $edadError = $correoError = "";
		$salir=true;

		if(isset($_REQUEST["enviar"])) 
		{	
            if (empty($_REQUEST['usuario']))
            {
				$usuarioError = "Nombre usuario obligatorio";
				$salir=false;
			} 
			else 
			{
				$usuario = test_input($_REQUEST["usuario"]);
				// comprueba que lleva solo letras y espacios
                if (!preg_match("/^[a-zA-Z ]*$/",$usuario)) 
               {
				  $usuarioError = "Solo se admiten letras y espacios en blanco"; 
				  $salir=false;
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
			
			if (!empty($_REQUEST["edad"])) 
				{
					$edad=$_REQUEST["edad"];
					if ($edad<18)
					{
						$edadError= "Solo se permite el alta a personas mayores de 18 años.";
						$salir=false;
					}
				}

				if (empty($_REQUEST["correo"])) 
				{
					$correoError = "Correo obligatorio";
					$salir=false;
				} 
				else 
				{
					$correo = test_input($_REQUEST["correo"]);
					// Comprueba que el formato es correcto
					if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) 
					{
					  $correoError = "Formato de correo erróneo";
					  $salir=false; 
					}
				}

			
			if ($salir==true)
			{
				$envio="Envio correcto";
				header("Location: menu.php");
				exit;
			}
		}
			
		?>    
    
        <div class="registro">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="registroCab"> 
					<img src="../img/hombre.jpg" alt="Avatar" width="60px">
					<h2>Registro de alta</h2>	
                </div>  
                <div class="registroCuerpo"> 
					<hr>
					<br>
					<label>Nombre usuario *: </label><input type="text" name="usuario" value="<?php echo $usuario;?>">
                    <span class="error"><?php echo $usuarioError;?></span>
                    <br><br>
					<label>Contraseña *: </label><input type="password" name="contrasena" minlength="6" maxlength="8" value="<?php echo $contrasena;?>">	
                    <span class="error"><?php echo $contrasenaError;?></span>
                    <br><br>	
					<label>Repite contraseña *: </label><input type="password" name="contrasena2" minlength="6" maxlength="8">	
					<span class="error"><?php echo $contrasena2Error;?></span>
					<br><br>
					<label>Edad *: </label><input type="number" name="edad" value="<?php echo $edad;?>">
  					<span class="error"><?php echo $edadError;?></span>
  					<br><br>
					<label>Correo *: </label><input type="email" name="correo" value="<?php echo $correo;?>">
  					<span class="error"><?php echo $correoError;?></span>
					<br><br><br>
					<hr>
                    <br>
					<label>Recordar usuario</label><input type="checkbox" name="recordar">
					<br><br>
					<input type="submit" name="enviar" value="Alta usuario"><span class="verde"><?php echo $envio;?></span>
					<br><br>
					<p><i>* Campos obligatorios para el alta de un nuevo usuario</i></p>
                </div>				
			</form>
		</div>    
   
</body>
</html>