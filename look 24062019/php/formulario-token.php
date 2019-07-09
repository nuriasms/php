<?php
    session_start();
    require ('funciones.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Token</title>
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

        if (validaToken($_REQUEST['codigo']))
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
                        header("Location: ../index.php");
                }
            }
                
        ?>
            <h2>Recuperar contraseña</h2>
            <form method="POST">
                <span class="error"><?php echo $contrasenaError;?></span></label>
                <label>Nueva contraseña: <input type="password" name="contrasena" minlength="4" maxlength="8" value="<?php echo $contrasena;?>">
                <br><br>	
                <label>Repite contraseña: <input type="password" name="contrasena2" minlength="4" maxlength="8">
                <br><br>
                <input type="submit" name="enviar" value="Aceptar">
                <br><br>
            </form>	
        <?php
        }
        else
        {
            echo "<h3>Su link no es valido o ha caducado</h3>";
        }	
		?>
	</body>
</html>