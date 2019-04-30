<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Alta usuario</title>
		<?php
			require ('php-functions-formulari-1.php');
		?>
		<style>
			.error{
				color:red;
			}
			.verde{
				color:green;
			}
		</style>
	</head>
	<body>
		<?php
            //Inicializa variables
            $usuario = $contrasena = $contrasena2 = $envio ="";
            $usuarioError = $contrasenaError = $contrasena2Error = "";
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
					$usuario = test_input($_POST["usuario"]);
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

				//https://diego.com.es/expresiones-regulares-en-php 
				if ($salir==true)
				{
					$envio="Envio correcto";
					header("Location: php-validar-usuario.php");
					exit;
				}
			}
			
			?>
			<h3>Registro:</h3>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<label>Usuario: <input type="text" name="usuario" value="<?php echo $usuario;?>">
                <span class="error"><?php echo $usuarioError;?></span></label>
				<br><br>
				<label>Contraseña: <input type="password" name="contrasena" minlength="6" maxlength="8" value="<?php echo $contrasena;?>">
                <span class="error"><?php echo $contrasenaError;?></span></label>
				<br><br>	
                <label>Repite contraseña: <input type="password" name="contrasena2" minlength="6" maxlength="8">
                <span class="error"><?php echo $contrasena2Error;?></span></label>
                <br><br><br>
				<input type="submit" name="enviar" value="Aceptar"><span class="verde"><?php echo $envio;?></span> 
			</form>
	
	</body>
</html>