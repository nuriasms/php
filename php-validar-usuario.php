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

			if(isset($_REQUEST["enviar"])) 
			{	
                if (empty($_REQUEST['usuario']))
                {
                    $usuarioError = "Nombre usuario obligatorio";
				} 
				else 
				{
					$usuario = test_input($_POST["usuario"]);
					// comprueba que lleva solo letras y espacios
                    if (!preg_match("/^[a-zA-Z ]*$/",$usuario)) 
                    {
					  $usuarioError = "Solo se admiten letras y espacios en blanco"; 
					}
                }
                
                if (empty($_REQUEST['contrasena']))
                {
                    $contrasenaError = "Contraseña obligatoria. Longitud de 8 a 12 carácteres";
				} 
				else 
				{ 
					$tmp = validarContrasena($_REQUEST['contrasena']);
					if (!empty($tmp))
					{
						$contrasenaError = "La contraseña ha de tener:".$tmp;
					}
				}    

				if (empty($_REQUEST['contrasena2']))
                {
                    $contrasena2Error = "Es obligatorio repetir la contraseña";
				} 
				else 
				{
					if (($_REQUEST['contrasena']) != ($_REQUEST['contrasena2']))
					{ 
						$contrasena2Error = "Las contraseñas no coinciden, vuelva a introducirlas";
					}
				}    

                //https://diego.com.es/expresiones-regulares-en-php


				
			$envio="Envio correcto"	;
			}
			
			?>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<label>Usuario: <input type="text" name="usuario" value="<?php echo $usuario;?>">
                <span class="error"><?php echo $usuarioError;?></span></label>
				<br><br>
				<label>Contraseña: <input type="password" name="contrasena" minlength="8" maxlength="12">
                <span class="error"><?php echo $contrasenaError;?></span></label>
				<br><br>	
                <label>Repite contraseña: <input type="password" name="contrasena2" minlength="8" maxlength="12">
                <span class="error"><?php echo $contrasena2Error;?></span></label>
                <br><br><br>
				<input type="submit" name="enviar" value="Aceptar"> <span class="verde"><?php echo $envio;?></span>
			</form>
	
	</body>
</html>