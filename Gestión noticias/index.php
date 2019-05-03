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
    <title>GN-Login</title>
    <?php
			require ('php/funciones.php');
	?>
    <style>
        body{
            background-color: lavender;
        }
        .login{
            width: 300px;
            height: 400px;
            background-color: white;
            position: relative;
            top:30px;
            left: 40%;
        }
        .loginCab img{
            width: 60%;
            padding-top:20px;
            padding-left: 110px;
        }
        .loginCuerpo{
            padding:10px 0 5px 50px;
        }
        .loginPie{
            background-color:#f1f1f1;
            text-align: right;
            padding-right: 30px;
        }
    </style>
</head>
<body>
    <?php
			
		if(isset($_REQUEST["enviar"])) 
		{	
			if (empty($_REQUEST['nombre']) || empty($_REQUEST['contrasena']))
			{
				print ("Debe introducir el nombre y la contraseña no puede estar vacío. <br>"); 
			}
			else
			{
				if (!$tmp=validarUsuario($_REQUEST['nombre'],$_REQUEST['contrasena']))
				{
						
					print("<br><span class='rojo'>ERROR al validar usuario</span><br><br>");										
				}
				else
				{
					if ((isset($_POST['recordar'])) && ($_POST['recordar'] == 1))
					{
						setcookie("usuario",$_REQUEST['nombre'],strtotime( '+30 days' ),"/",false, false);
						setcookie("contrasena",$_REQUEST['contrasena'],strtotime( '+30 days' ),"/",false, false);  
					}
					$_SESSION["nombre_usuario"] = $_REQUEST['nombre'];
					if(isset($_SESSION["nombre_usuario"]))
					{
						header("Location: php/menu.php");
					}
				}
			}
		}
			
	?>    
    
        <div class="login">
			<form method="post">
                <div class="loginCab">    
                    <img src="img/avatar.png" alt="Avatar">	
                </div>  
                <div class="loginCuerpo"    
			      	<br><br>
			        <label for="nombre"><b>Usuario</b></label><br>
			        <input type="text" placeholder="Nombre usuario" name="nombre" required>
					<br><br>
			        <label for="contrasena"><b>Contraseña</b></label><br>
			        <input type="password" placeholder="Password" name="contrasena" required>
			        <br><br> 
			        <input type="submit" name="enviar" value="Iniciar sesión"></input>
			        <br><br>
			        <label>
			         <input type="checkbox" checked name="recordar"> Recordar usuario
                    </label>
                    <br><br>
                </div>
			    <div class="loginPie">
			        <span class="psw">Olvidar <a href="#" onclick="borrarCookie();">usuario?</a></span>
			    </div>
			</form>
		</div>    
   
</body>
</html>