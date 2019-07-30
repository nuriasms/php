<?php
    session_start();
    require ('funciones.php');
    $mostrarError="";
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
		<!----------------------------------CABECERA------------------------------------------------>
		<?php
			$origen="consulta";
			include ('../html/cabecera.html');
		?>
		<!---------------------------------BARRA NAVEGACIÓN------------------------------------------>
		<?php
			$barra="token";
			include ('barra.php');
		?>
        <!----------------------------FORMULARIO TOKEN -------------------------------------------->

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

                if (empty($respuesta))
                {
                    if (guardaContrasena($_REQUEST['contrasena'],$_REQUEST['codigo'])){
                         //header("Location: ../index.php");
                         echo "<script> window.location='../index.php'; </script>";

                    }
                }
            }       
        ?>
        <div class="recuadrolistado">
			<div class="registrolistado token" >
				<h3>Recuperar contraseña</h3>
				<hr>

            <!--div class="token"> 
                <h2>Recuperar contraseña</h2>
                <br-->
                <form method="POST">
                    <label>Nueva contraseña: <input type="password" name="contrasena" minlength="4" maxlength="8" value="<?php echo $contrasena;?>"></label>
                    <br><br>	
                    <label>Repite contraseña: <input type="password" name="contrasena2" minlength="4" maxlength="8"></label>
                    <br><br>
                    <label><span class="error"><?php echo $contrasenaError;?></span></label>
                    <br><br>
                    <input type="submit" name="enviar" value="Cambiar">
                    <br><br>
                </form>
            </div>	</div>
        <?php
        }
        else
        {
            echo "<h3>Su link no es valido o ha caducado</h3>";
        }	
            $origen="look";
            $barra="look";
			include ('../html/pie.html');
		?>        
	</body>
</html>