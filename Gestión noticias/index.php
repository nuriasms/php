<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="lib/css/bootstrap.min.css">
	<script src="lib/js/jquery.min.js"></script>
	<script src="lib/js/bootstrap.min.js"></script>
    <title>Gestión noticias-Login</title>
	<link rel="stylesheet" href="css/style.css"> 
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
					iniciarSesion($_REQUEST['nombre'],$_REQUEST['contrasena']);
				}
			}
		}
			
	?>    
    
        <div class="login">
			<form method="post">
                <div class="loginCab">    
                    <img src="img/avatar.png" alt="Avatar">	
                </div>  
                <div class="loginCuerpo">    
			      	<br>
					<span class="error"><?php echo $mostrarError;?></span>
					<br>
			        <label for="nombre"><b>Usuario</b></label><br>
			        <input type="text" placeholder="Nombre usuario" name="nombre" required>
					<br><br>
			        <label for="contrasena"><b>Contraseña</b></label><br>
			        <input type="password" placeholder="Password" name="contrasena" required>
			        <br><br> 
			        <!--input type="submit" name="enviar" value="Iniciar sesión"></input-->
					<button type="submit" name="enviar" class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span> Iniciar sesión </button>
			        <br><br>
			        <label>
			         <input type="checkbox" checked name="recordar"> Recordar usuario
                    </label>
                    <br><br>
					<a class="altaUsuario" href="php/alta-usuario.php">Registrar nuevo usuario</a>
					<br><br>
                </div>
			    <div class="loginPie">
			        <span class="psw">Olvidar <a href="#" onclick="borrarCookie();">usuario?</a></span>
			    </div>
				
			</form>
		</div>    
   
</body>
</html>