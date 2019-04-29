<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Alta usuario</title>
		<?php
			require ('php-functions-formulari-1.php');
		?>
		<style>
			.verde{
				color:green;
			}
			.rojo{
				color:red;
			}
		</style>
	</head>
	<body>
		<?php
            //Inicializa variables
            $usuario = $contrasena = $contrasena2 = "";
            $usuarioError = $contrasenaError = $contrasena2Error = "";

			if(isset($_REQUEST["enviar"])) 
			{	
                if (empty($_REQUEST['usuario'])
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
                
                if (empty($_REQUEST['contrasena'])
                {
                    $contrasenaError = "Contraseña obligatoria. Longitud de 8 a 12 carácteres";
				} 
				else 
				{
                    $contrasena = $_REQUEST['contrasena'];
                    //comprueba la longitud
                    if (strlen($contrasena)>12 || strlen($contrasena)<8 )
                    {
                        $contrasenaError = "Longitud contraseña errónea, entre 8 a 12 caracteres";
                    }
					// comprueba que lleva 1 mayuscula, 1 minuscula, 1 numero
                    if () 
                    {
					  $usuarioError = "Solo se admiten letras y espacios en blanco"; 
					}
				}    

                //https://diego.com.es/expresiones-regulares-en-php


				
				
			}
			?>
			<form method="POST">
				<label>Usuario: <input type="text" name="usuario" minlength="8">
                <span class="error"><?php echo $usuarioError;?></span></label>
				<br><br>
				<label>Contraseña: <input type="password" name="contrasena" minlength="8" maxlength="12">
                <span class="error"><?php echo $contrasenaError;?></span></label>
				<br><br>	
                <label>Repite contraseña: <input type="password" name="contrasena2" minlength="8" maxlength="12">
                <span class="error"><?php echo $contrasena2Error;?></span></label>
                <br><br><br>
				<input type="submit" name="enviar" value="Aceptar">
			</form>
	
	</body>
</html>