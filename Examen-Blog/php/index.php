<?php
	session_start();
	require ('funciones.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" content="Blog dedicada a la promoción de un deporte de equipo como es el VOLEIBOL.">
    <meta name="keywords" content="voleibol, saque, bloqueo, remate, libero, central, punta, opuesto, barillas, red, campo, receptor, zaguero, entrenador, club, arbitro, balón">
    <meta http-equip="Expires" content="no-cache">
	<link rel="stylesheet" href="../lib/css/bootstrap.min.css">
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../img/favicon.ico" type="image/x-icon">
	<script src="../lib/js/jquery.min.js"></script>
	<script src="../lib/js/bootstrap.min.js"></script>
    <title>Blog voleibol</title>
	<link rel="stylesheet" href="../css/style.css"> 
</head>
<body>
	<noscript>Disculpe, su navegador no soporta JavaScript!</noscript>
	<?php
		include ('../html/cabecera.html');
	?>
	<!---------------------------------INICIO ----------------------------------->
	<div class="login">
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

		<form method="post">
            <div class="loginCab">    
                <img src="../img/avatar.jpg" alt="Avatar">	
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
		        <label><input type="checkbox" checked name="recordar"> Recordar usuario</label>
                <br><br>
				<a class="altaUsuario" href="alta-usuario.html">Registrar nuevo usuario</a>
				<br>
            </div>
			<div class="loginPie">
			    <span class="psw">Olvidar <a href="#" onclick="borrarCookie();">usuario?</a></span>
			</div>
			<br>				
		</form>
	</div>
	<!-------------------------------FIN -----------------------------------> 
	<?php
		include ('../html/pie.html');
	?>
</body>
</html>