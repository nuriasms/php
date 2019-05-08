<?php

    function validarUsuario($nombre,$contrasena)
    {
        $respuesta=false;
        if (($nombre==="Mireia") && (md5(sha1($contrasena)==="700c8b805a3e2a265b01c77614cd8b21"))) $respuesta=true;
        return $respuesta;	
    }

    function validarCookie($nombre,$contrasena)
    {
        $respuesta=false;
        if (($nombre==="Mireia") && ($contrasena==="700c8b805a3e2a265b01c77614cd8b21")) $respuesta=true;
        return $respuesta;	
    }

    function guardarCookie($usuario,$contrasena,$recordar)
    {
        if ((isset($recordar)) && ($recordar == 1))
		{
            $psw=md5(sha1($contrasena));
			setcookie("usuario",$usuario,strtotime( '+30 days' ),"/",false, false);
			setcookie("contrasena",$psw,strtotime( '+30 days' ),"/",false, false);  
		}
    }

    function iniciarSesion($usuario,$contrasena)
    {
        $_SESSION["nombre_usuario"] = $usuario;
        $_SESSION["contrasena"] = $contrasena;
		if(isset($_SESSION["nombre_usuario"]) && isset($_SESSION["contrasena"]) )
		{
			header("Location: php/menu.php");
		}
    }    

    function validarSesionAbierta()
    {
        $nombre = $tmp = "";
        if ((isset($_SESSION["nombre_usuario"])&&(isset($_SESSION["contrasena"])))||(isset($_COOKIE["usuario"])&&(isset($_COOKIE["contrasena"]))))
        {
            if(isset($_SESSION["nombre_usuario"]))
            {
                if (!$tmp=validarUsuario($_SESSION['nombre_usuario'],$_SESSION['contrasena']))
                {		
                    header("Location: ../index.php");										
                }
                else
                {
                    $nombre="Bienvenid@: ".$_SESSION['nombre_usuario']; 
                }   
            }
            else
            {     
                if ($tmp=validarCookie($_COOKIE["usuario"],$_COOKIE["contrasena"]))
                {
                    $nombre="Bienvenid@: ".$_COOKIE['usuario'];
                } 
                else
                {
                    header("Location: ../index.php");
                }    
            }
            return $nombre;
            //print ("<a href='cerrar-sesion.php' title='Cerrar sesión'>Cerrar sesión</a>");
        }
        else
        {
            header("Location: ../index.php");
        }
    } 

    function test_input($data) 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
    }

    function validarContrasena($clau)
    {
		$error="";
		
		if (!preg_match('/[$@$!%*?&]+/',$clau)) 
       	{
           $error = $error." un carácter especial $@!%*?&";
       	}
       	if ((strlen($clau) < 6) || (strlen($clau) > 8))
       	{
           $error = $error." entre 6 o 8 carácteres, ";
      	}
      	if (!preg_match('`[a-z]`',$clau))
       	{
           $error = $error." una letra minúscula mínimo, ";
       	}
       	if (!preg_match('`[A-Z]`',$clau))
       	{
            $error = $error." una letra mayúscula mínimo, ";
        }
       	if (!preg_match('`[0-9]`',$clau))
       	{
            $error = $error." un número mínimo.";
		}
        return $error;
    }














?>