<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
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

        if (!validaToken($_REQUEST['token']))
        {

            $contrasenaError = $contrasena = '';
            $respuesta = true;

                if(isset($_REQUEST["enviar"])) 
                {	                
                    if (empty($_REQUEST['contrasena']) || empty($_REQUEST['contrasena2']) || (($_REQUEST['contrasena'])!=($_REQUEST['contrasena'])))
                    {
                        $contrasenaError = "Debe introducir una nueva contraseña y repetirla para su validación. <br>"; 
                        $respuesta = false;
                    }
                    else
                    {
                        $respuesta=validarContrasena($_REQUEST['contrasena']);
                    }

                    if ($respuesta)
                    {
                        if (!guardaContrasena($_REQUEST['contrasena'],$_REQUEST['token']))
                        header("Location: sql-valida-login-V2.php");
                    }
                }
                
            ?>
                <h2>Recuperar contraseña</h2>
                <form method="POST">
                    <span class="error"><?php echo $contrasenaError;?></span></label>
                    <label>Nueva contraseña: <input type="password" name="contrasena" minlength="6" maxlength="8" value="<?php echo $contrasena;?>">
                    <br><br>	
                    <label>Repite contraseña: <input type="password" name="contrasena2" minlength="6" maxlength="8">
                    <br><br>
                    <input type="submit" name="enviar" value="Aceptar">
                    <br><br>
                </form>	
        }
        else
        {
            echo "<h3>Su link no es valido o ha caducado</h3>";
        }	
		
	</body>
</html>