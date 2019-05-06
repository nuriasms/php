<?php
    function cerrarSesion()
    {
        session_start();
        //borra variables de la sesión
        unset($_SESSION["nombre_usuario"]);  
        //cierra sesión
        session_destroy();
        borrarCookie();
        header("Location: ../index.php");
        exit;
    }

    function borrarCookie()
    {
        //Destruir cookie.
        setcookie("usuario",0,1,"/",false, false);
        setcookie("contrasena",0,1,"/",false, false);
        header("Location: ../index.php");
        exit;
    }

    function validarUsuario($nombre,$contrasena)
	{
		$respuesta=false;
		if (($nombre==="USER") && (md5(sha1($contrasena)==="700c8b805a3e2a265b01c77614cd8b21"))) $respuesta=true;
		return $respuesta;	
    }
    
    function guardarCookie($usuario,$contrasena,$recordar)
    {
        if ((isset($recordar)) && ($recordar == 1))
		{
			setcookie("usuario",$_REQUEST['nombre'],strtotime( '+30 days' ),"/",false, false);
			setcookie("contrasena",$_REQUEST['contrasena'],strtotime( '+30 days' ),"/",false, false);  
		}
    }

    function iniciarSesion($usuario)
    {
        $_SESSION["nombre_usuario"] = $usuario;
		if(isset($_SESSION["nombre_usuario"]))
		{
			header("Location: php/menu.php");
		}
    }

    function validarSesionAbierta()
    {
        $nombre="";
        if (isset($_SESSION["nombre_usuario"])||(isset($_COOKIE["usuario"])&&(isset($_COOKIE["contrasena"]))))
        {
            if(isset($_SESSION["nombre_usuario"]))
            {
                $nombre="Bienvenid@: ".$_SESSION['nombre_usuario'];    
            }
            else
            {     
                if ($tmp=validarUsuario($_COOKIE["usuario"],$_COOKIE["contrasena"]))
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

    function formatearFecha($valor)
	{
		$data= strtotime($valor);
		//setlocale(LC_TIME,'es_ES');
		//UGII_LANG=spanish //en XAMPP
		setlocale(LC_TIME,'spanish');
		//return iconv("iso-8859-1","utf-8",(ucfirst(strftime("%A, %d de %B de %Y", $data))));
		return utf8_encode(ucfirst(strftime("%A, %d de %B de %Y", $data)));
		//return ucfirst(strftime("%#x", $data));
		
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