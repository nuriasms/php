<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../lib/css/bootstrap.min.css">
	<script src="../lib/js/jquery.min.js"></script>
	<script src="../lib/js/bootstrap.min.js"></script>
    <title>Gestión noticias-Login</title>
	<link rel="stylesheet" href="../css/style.css"> 
    <?php
			require ('php/funciones.php');
	?>
</head>
<body>
	<noscript>Disculpe, su navegador no soporta JavaScript!</noscript>
    <?php	
		$mostrarError="";

		if(isset($_REQUEST["enviar"])) 
		{	
			if (empty($_REQUEST['nombre']) || empty($_REQUEST['contrasena']))
			{
				$mostrarError="Debe introducir el nombre y la contraseña no puede estar vacío."; 
			}
			else
			{
				if (!$tmp=validarUsuario($_REQUEST['nombre'],$_REQUEST['contrasena']))
				{
						
					$mostrarError="ERROR al validar usuario";										
				}
				else
				{
					guardarCookie($_REQUEST['nombre'],$_REQUEST['contrasena'],$_REQUEST['recordar']);
					iniciarSesion($_REQUEST['nombre']);
				}
			}
		}
			
	?>    
    
        <div class="login">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="loginCab">    
                    <img src="../img/avatar.png" alt="Avatar">	
                </div>  
                <div class="loginCuerpo">    
			      	<br>
					<span class="error"><?php echo $mostrarError;?></span>
					<br>
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
					
			        <br><br>
			        <label>
			         <input type="checkbox" checked name="recordar"> Recordar usuario
                    </label>
					<br><br>
                </div>				
			</form>
		</div>    
   
</body>
</html>