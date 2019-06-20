<?php
    /*----------------------------------------------------------------------------------------------*/
    /* function validarUsuario:                                                                     */
    /* Comprueba que el usuario y la contraseña introducidos por el usuario coincide con la guardada*/
    /*                                                                                              */
    /* Argumentos: recibe el nombre y la contraseña                                                 */
    /* Devuelve: true/false                                                                         */
    /*----------------------------------------------------------------------------------------------*/
    function validarUsuario($nombre,$contrasena)
    {
        $respuesta=false;
        if (($nombre==="Mireia") && (md5(sha1($contrasena)==="700c8b805a3e2a265b01c77614cd8b21"))) $respuesta=true;
        return $respuesta;	
    }
    /*----------------------------------------------------------------------------------------------*/
    /* function validarCookie:                                                                     */
    /* Comprueba que el usuario y la contraseña introducidos por el usuario coincide con la guardada*/
    /* en la cookie                                                                                 */
    /*                                                                                              */
    /* Argumentos: recibe el nombre y la contraseña                                                 */
    /* Devuelve: true/false                                                                         */
    /*----------------------------------------------------------------------------------------------*/
    function validarCookie($nombre,$contrasena)
    {
        $respuesta=false;
        if (($nombre==="Mireia") && ($contrasena==="700c8b805a3e2a265b01c77614cd8b21")) $respuesta=true;
        return $respuesta;	
    }
    /*----------------------------------------------------------------------------------------------*/
    /* function guardarCookie:                                                                     */
    /* Guarda el usuario y la contraseña en cookies durante 30 dias                                 */
    /*                                                                                              */
    /* Argumentos: recibe el nombre, la contraseña y si desea guardar                               */
    /*----------------------------------------------------------------------------------------------*/
    function guardarCookie($usuario,$contrasena,$recordar)
    {
        if ((isset($recordar)) && ($recordar == 1))
		{
            $psw=md5(sha1($contrasena));
			setcookie("usuario",$usuario,strtotime( '+30 days' ),"/",false, false);
			setcookie("contrasena",$psw,strtotime( '+30 days' ),"/",false, false);  
		}
    }
    /*----------------------------------------------------------------------------------------------*/
    /* function iniciarSesion:                                                                      */
    /* Abre una nueva sesión                                                                        */
    /*                                                                                              */
    /* Argumentos: recibe el usuario y la contraseña                                                */
    /* Devuelve: true/false                                                                         */
    /*----------------------------------------------------------------------------------------------*/
    function iniciarSesion($usuario,$contrasena)
    {
        $_SESSION["nombre_usuario"] = $usuario;
        $_SESSION["contrasena"] = $contrasena;
		if(isset($_SESSION["nombre_usuario"]) && isset($_SESSION["contrasena"]) )
		{
			header("Location: look.php");
		}
    }    
    /*----------------------------------------------------------------------------------------------*/
    /* function validarSesionAbierta:                                                               */
    /* Comprueba que los datos estan activos para que el usuario acceda a la página                 */
    /*                                                                                              */
    /*----------------------------------------------------------------------------------------------*/
    function validarSesionAbierta()
    {
        $nombre = $tmp = "";
        if ((isset($_SESSION["nombre_usuario"])&&(isset($_SESSION["contrasena"])))||(isset($_COOKIE["usuario"])&&(isset($_COOKIE["contrasena"]))))
        {
            if(isset($_SESSION["nombre_usuario"]))
            {
                if (!$tmp=validarUsuario($_SESSION['nombre_usuario'],$_SESSION['contrasena']))
                {		
                    header("Location: index.php");										
                }
                else
                {
                    $nombre="Bienvenid@:  <span class='nom'>".$_SESSION['nombre_usuario']."</span>"; 
                }   
            }
            else
            {     
                if ($tmp=validarCookie($_COOKIE["usuario"],$_COOKIE["contrasena"]))
                {
                    $nombre="Bienvenid@:   <span class='nom'>".$_COOKIE['usuario']."</span>";
                } 
                else
                {
                    header("Location: index.php");
                }    
            }
            return $nombre;
        }
        else
        {
            header("Location: index.php");
        }
    } 
    /*----------------------------------------------------------------------------------------------*/
    /* function cerrarSesion:                                                                       */
    /* borra la sesión activa del navegador                                                         */
    /*                                                                                              */
    /*----------------------------------------------------------------------------------------------*/
    function cerrarSesion()
    {
        session_start();
        //borra variables de la sesión
        unset($_SESSION["nombre_usuario"]);  
        //cierra sesión
        session_destroy();
        //borra coockie
        //borrarCookie();
        header("Location: index.php");
        exit;
    }
    /*----------------------------------------------------------------------------------------------*/
    /* function test_input:                                                                         */
    /* revisa el campo recibido y quita los espacios blanco de más                                  */
    /*                                                                                              */
    /* Argumentos: recibe el campo a examinar                                                       */
    /* Devuelve: campo                                                                              */
    /*----------------------------------------------------------------------------------------------*/
    function test_input($data) 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
    }
    /*----------------------------------------------------------------------------------------------*/
    /* function validarContrasena:                                                                 */
    /* Comprueba que la contraseña cumpla los requisitos: longitud entre 6 y 8 carácteres.          */
    /* minimo una letra mayuscula, una letra minuscula y un caracter especial                       */
    /*                                                                                              */
    /* Argumentos: recibe el campo a examinar                                                       */
    /* Devuelve: campo                                                                              */
    /*----------------------------------------------------------------------------------------------*/
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
    /*----------------------------------------------------------------------------------------------*/
    /* function calculaEdad:                                                                        */
    /* Comprueba que sea mayor de edad a partir de la fecha introducida                             */
    /*                                                                                              */
    /* Argumentos: recibe fecha de nacimiento                                                       */
    /* Devuelve: edad                                                                               */
    /*----------------------------------------------------------------------------------------------*/
    function calculaEdad($fechanacimiento)
    {
        list($ano,$mes,$dia) = explode("-",$fechanacimiento);
        $ano_diferencia  = date("Y") - $ano;
        $mes_diferencia = date("m") - $mes;
        $dia_diferencia   = date("d") - $dia;
        //print ($ano_diferencia."-".$ano."-".$mes_diferencia."-".$mes."-".$dia_diferencia."-".$dia);
        if ($dia_diferencia < 0 || $mes_diferencia < 0)
          $ano_diferencia--;
        return $ano_diferencia;
    }
    /*----------------------------------------------------------------------------------------------*/
    /* function validarFichero:                                                                        */
    /* Guarda el fichero y le cambia el nombre para evitar que se duplique con la entrada de otro usuario*/
    /*                                                                                              */
    /* Devuelve: el nombre                                                                          */
    /*----------------------------------------------------------------------------------------------*/
    function validarFichero()
	{
		$nombre="";
		if (is_uploaded_file($_FILES['fichero']['tmp_name']))
		{ 
			$nombreDirectorio= "../img/";
			$nombreFichero= $_FILES['fichero']['name'];
			$nombreCompleto= $nombreDirectorio. $nombreFichero;
			if(is_file($nombreCompleto))
			{
				$idUnico= time();
				$nombreFichero= $idUnico. "-" . $nombreFichero;
			}
			move_uploaded_file($_FILES['fichero']['tmp_name'],$nombreDirectorio.
			$nombreFichero);
			$nombre=($nombreDirectorio.$nombreFichero);
		}
		return $nombre;
	}
    /*----------------------------------------------------------------------------------------------*/
    /* function contadorLikes:                                                                      */
    /* Cuenta los "me gusta" o "no me gusta" de las publicaciones                                   */
    /*                                                                                              */
    /* Argumentos: recibe el nombre de la cookie en la que se guarda el contador de la publicación  */
    /* Devuelve: los  likes acumulados en la cookie                                                 */
    /*----------------------------------------------------------------------------------------------*/
    function contadorLikes($nom)
    {
        if (isset($_COOKIE[$nom]))
        {
            $contador = $_COOKIE[$nom] + 1;
        }
        else
        {
            $contador = 1;
        }
        setcookie($nom,$contador,strtotime( '+30 days' ),"/",false, false);   
        return $contador;
    }
    /*----------------------------------------------------------------------------------------------*/
    /* function leerContador:                                                                       */
    /* Inicializa el contador de los likes, según el último valor giardado en las cookie            */
    /*                                                                                              */
    /* Argumentos: recibe el nombre de la cookie en la que se guarda el contador de la publicación  */
    /* Devuelve: el contador                                                                        */
    /*----------------------------------------------------------------------------------------------*/
    function leerContador($nom)
    {
        $contador=0;
        if (isset($_COOKIE[$nom]))
        {
            $contador = $_COOKIE[$nom];
        }
        return $contador;
    }
?>