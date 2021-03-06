<?php
	/*----------------------------------------------------------------------------------------------*/
    /* function conectaBBDD:                                                                        */
    /* Conecta PHP con la BBDD para poder trabajar con la información que contiene                  */
    /*                                                                                              */
    /* Argumentos: ninguno                                                                          */
    /* Devuelve: true/false                                                                         */
    /*----------------------------------------------------------------------------------------------*/
    function conectaBBDD()
	{
        //funció per executar amb XAMPP
		$respuesta=false;
		$con = '';
		// dades de configuració XAMPP
		/*$ip = 'localhost';
		$usuari = 'prova';
		$password = 'prova';
        $db_name = 'prova';*/
        
        // dades de configuració SERVER
		$ip = 'formacio.obsea.es';
		$usuari = 'nuria';
		$password = 'npons';
		$db_name = 'nuria';
		$port = '13308';

		// connectem amb la db XAMPP
        //$con = mysqli_connect($ip,$usuari,$password,$db_name);
        
        // connectem amb la db SERVER
        $con = mysqli_connect($ip,$usuari,$password,$db_name,$port);
        
		if (!$con)  
		{
			echo "Ha fallat la connexió a MySQL: " . mysqli_connect_errno();
			echo "Ha fallat la connexió a MySQL: " . mysqli_connect_error();
		}
		else
		{
			if (!mysqli_set_charset($con,"utf8"))
			{
				echo "Ha fallat la lectura dels caracters utf8: " . mysqli_error($con);
				exit();
			} 
		}
		return $con;
	}
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
		$tmp = $tmp_psw = $sql = $consulta = $con = '';
		
		$con = conectaBBDD();
		$tmp=strtolower($nombre);
		//$tmp = mb_strtolower($nombre, 'UTF-8');
        $tmp_psw=md5(sha1($contrasena));
        $sql="SELECT nom, contrasenya FROM usuari WHERE nom = '$tmp' AND contrasenya = '$tmp_psw'";
		$consulta = mysqli_query($con, $sql)  or die('Consulta fallida: ' . mysqli_error($con));
		if (mysqli_num_rows($consulta) > 0)
		{
			$respuesta=true;
        }
		
		mysqli_close($con);
		return $respuesta;	
	}
    /*----------------------------------------------------------------------------------------------*/
    /* function validarCookie:                                                                      */
    /* Comprueba que el usuario y la contraseña introducidos por el usuario coincide con la guardada*/
    /* en la cookie                                                                                 */
    /*                                                                                              */
    /* Argumentos: recibe el nombre y la contraseña                                                 */
    /* Devuelve: true/false                                                                         */
    /*----------------------------------------------------------------------------------------------*/
    function validarCookie($nombre,$contrasena)
    {
		$respuesta=false;
		$tmp = $tmp_psw = $sql = $consulta = $con = '';
		
        $con = conectaBBDD();  
		$tmp=strtolower($nombre);   //php 7.0
		//$tmp = mb_strtolower($nombre, 'UTF-8');   //php 7.2
        $tmp_psw=md5(sha1($contrasena));
        $sql="SELECT nom, contrasenya FROM usuari WHERE nom = '$tmp' AND contrasenya = '$tmp_psw'";
		$consulta = mysqli_query($con, $sql)  or die('Consulta fallida: ' . mysqli_error($con));
		if (mysqli_num_rows($consulta) > 0)
		{
			$respuesta=true;
        }
		
		mysqli_close($con);
        return $respuesta;	
    }
    /*----------------------------------------------------------------------------------------------*/
    /* function guardarCookie:                                                                      */
    /* Guarda el usuario y la contraseña en cookies durante 30 dias                                 */
    /*                                                                                              */
    /* Argumentos: recibe el nombre, la contraseña y si desea guardar                               */
    /*----------------------------------------------------------------------------------------------*/
    function guardarCookie($usuario,$contrasena,$recordar)
    {
        if ($recordar == 1)
		{
			$tmp=strtolower($usuario);
			//$tmp = mb_strtolower($usuario, 'UTF-8');
            $psw=md5(sha1($contrasena));
			setcookie("usuario",$tmp,strtotime( '+30 days' ),"/",false, false);
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
        $respuesta=false;
       // $_SESSION["nombre_usuario"] = mb_strtolower($usuario, 'UTF-8');

		$_SESSION["nombre_usuario"] = strtolower($usuario);
        $_SESSION["contrasena"] = $contrasena;
		if(isset($_SESSION["nombre_usuario"]) && isset($_SESSION["contrasena"]) )
		{
			$respuesta=true;
        }
        return $respuesta;
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
                   header("Location: ../index.php");										
										
                }
                else
                {
                    $nombre=$_SESSION['nombre_usuario']; 
                }   
            }
            else
            {     
                if ($tmp=validarCookie($_COOKIE["usuario"],$_COOKIE["contrasena"]))
                {
                    $nombre=$_COOKIE['usuario'];
                } 
                else
                {
                    header("Location: ../index.php");
                }    
            }
            return $nombre;
        }
        else
        {
            header("Location: ../index.php");
        }
    } 
    /*----------------------------------------------------------------------------------------------*/
    /* function validarColaborador:                                                               */
    /* Comprueba que los datos estan activos para que el usuario acceda a la página                 */
    /*                                                                                              */
    /*----------------------------------------------------------------------------------------------*/
    function validarColaborador()
    {
        $nombre = $tmp = "";
        if ((isset($_SESSION["nombre_usuario"])&&(isset($_SESSION["contrasena"])))||(isset($_COOKIE["usuario"])&&(isset($_COOKIE["contrasena"]))))
        {
            if(isset($_SESSION["nombre_usuario"]))
            {
                if (!$tmp=validarUsuario($_SESSION['nombre_usuario'],$_SESSION['contrasena']))
                {		
                    $nombre ="";										
                }
                else
                {
                    $nombre=$_SESSION['nombre_usuario']; 
                }   
            }
            else
            {     
                if ($tmp=validarCookie($_COOKIE["usuario"],$_COOKIE["contrasena"]))
                {
                    $nombre=$_COOKIE['usuario'];
                }                 
            }            
        }
        return $nombre;
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
        header("Location: ../index.php");
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
    /* function validarContrasena:                                                                  */
    /* Comprueba que la contraseña cumpla los requisitos: longitud entre 6 y 8 carácteres.          */
    /* minimo una letra mayuscula, una letra minuscula y un caracter especial                       */
    /*                                                                                              */
    /* Argumentos: recibe el campo a examinar                                                       */
    /* Devuelve: campo                                                                              */
    /*----------------------------------------------------------------------------------------------*/
    function validarContrasena($clau)
    {
		$error="";
		
		if ((strlen($clau) < 4) || (strlen($clau) > 8))
       	{
           $error = $error." entre 4 a 8 carácteres, ";
      	}
       	if (!preg_match('`[0-9]`',$clau))
       	{
            $error = $error." un número mínimo.";
		}
        return $error;
    }
    /*----------------------------------------------------------------------------------------------*/
    /* function altaUsuario:                                                                        */
    /* Inserta el nuevo usuario en la BBDD                                                          */
    /*                                                                                              */
    /* Argumentos: recibe nombre, nacimiento, correo y contraseña                                   */
    /* Devuelve: true/false                                                                         */
    /*----------------------------------------------------------------------------------------------*/    
    function altaUsuario($nombre,$edad,$correo,$contrasena,$nivel)
	{
		$respuesta=false;
		$tmp = $tmp_psw = $minusc = $sql = $consulta = $con = '';
		
        $con = conectaBBDD();
		$tmp=strtolower($nombre);
        //$tmp = mb_strtolower($nombre, 'UTF-8');
        
        $sql="SELECT nom FROM usuari WHERE nom = '$tmp'";
		$consulta = mysqli_query($con, $sql)  or die('Consulta fallida: ' . mysqli_error($con));
		if (mysqli_num_rows($consulta) == 0)
		{
            //$tmp = html_entity_decode($minusc, ENT_QUOTES | ENT_HTML401, "UTF-8");
            $tmp_psw=md5(sha1($contrasena));
            $sql="INSERT into usuari (nom,naixement,correu,contrasenya,nivell) values ('$tmp','$edad','$correo','$tmp_psw','$nivel')";
            $consulta = mysqli_query($con, $sql) or die('Consulta fallida: ' . mysqli_error($con));
            $respuesta=true;	
        }
		mysqli_close($con);
		return $respuesta;
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
    /* function validarFichero:                                                                     */
    /* Guarda el fichero y le cambia el nombre para evitar que se duplique con la entrada de otro usuario*/
    /*                                                                                              */
    /* Devuelve: el nombre                                                                          */
    /*----------------------------------------------------------------------------------------------*/
    function validarFichero()
	{
		$nombre="";
		if (is_uploaded_file($_FILES['fichero']['tmp_name']))
		{ 
			$nombreDirectorio= "../imgSQL/";
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
    /* function formatearFecha:                                                                     */
    /* Da formato "elegante" a la fecha recibida del sistema                                        */
    /*                                                                                              */
    /* Argumentos: recibe la fecha del sistema                                                      */
    /* Devuelve: la fecha en formato elegante                                                       */
    /*----------------------------------------------------------------------------------------------*/
    function formatearFecha($valor)
	{
		$data= strtotime($valor);
		//setlocale(LC_TIME,'es_ES');
		//UGII_LANG=spanish //en XAMPP//--------------------
        setlocale(LC_TIME,'spanish');
        //setlocale(LC_TIME, 'es_ES.UTF-8');
		//return iconv("iso-8859-1","utf-8",(ucfirst(strftime("%A, %d de %B de %Y", $data))));
        //return utf8_encode(ucfirst(strftime("%A, %d de %B de %Y", $data)));
        return ucfirst(strftime("%A, %d de %B de %Y", $data));//-------------------
        //return ucfirst(strftime("%#x", $data));
        //return ucfirst(strftime("%A, %d de %B de %Y", $data));
 
		
    }

    function obtenerFechaEnLetra($fecha){
        $dia= conocerDiaSemanaFecha($fecha);
        $num = date("j", strtotime($fecha));
        $anno = date("Y", strtotime($fecha));
        $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
        $mes = $mes[(date('m', strtotime($fecha))*1)-1];
        return $dia.', '.$num.' de '.$mes.' del '.$anno;
    }
     
    function conocerDiaSemanaFecha($fecha) {
        $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
        $dia = $dias[date('w', strtotime($fecha))];
        return $dia;
    }
	/*----------------------------------------------------------------------------------------------*/
    /* function guardarNoticia:                                                                      */
    /* Inserta una nueva noticia en la tabla     						                             */
    /*                                                                                               */
    /* Argumentos: titulo, contenido, foto, autor,fecha                                              */
    /* Devuelve: true/false                                                                          */
    /*----------------------------------------------------------------------------------------------*/
    function guardarNoticia($titulo,$contenido,$nombreFichero,$nombre,$data,$activo)
    {
        $respuesta=false;
		$tmp = $con = $sql = $consulta = "";
		
        $con = conectaBBDD();
        $tmp=strtolower($nombre);
        //$tmp=mb_strtolower($nombre, 'UTF-8');
		$sql="INSERT INTO noticies (idnoticia,titular,noticia,data,foto,autor,activo) VALUES (NULL,'$titulo','$contenido','$data','$nombreFichero','$tmp','$activo')";
		$consulta = mysqli_query($con, $sql) or die('Consulta fallida: ' . mysqli_error($con));
		$respuesta=true;	
		
		mysqli_close($con);
		return $respuesta;	
    }
	
	/*----------------------------------------------------------------------------------------------*/
    /* function validarTipoUsuario:                                                                       */
    /* Comprueba que el usuario conectado en la web es administrador     						    */
    /*                                                                                              */
    /* Argumentos: usuario                                                                          */
    /* Devuelve: true/false                                                                         */
    /*----------------------------------------------------------------------------------------------*/
    function validarTipoUsuario($usuario,$tipo)
    {
		$respuesta=false;
		$tmp = $consulta = $sql = $con = '';
		
		$con = conectaBBDD();
        $tmp=strtolower($usuario);
        //$tmp=mb_strtolower($usuario, 'UTF-8');
        $sql="SELECT * FROM usuari WHERE nom = '$tmp' AND nivell = '$tipo'";
		$consulta = mysqli_query($con, $sql)  or die('Consulta fallida: ' . mysqli_error($con));
		if (mysqli_num_rows($consulta) > 0)
		{
			$respuesta=true;
        }
		
		mysqli_close($con);
		return $respuesta;	
    }
	/*----------------------------------------------------------------------------------------------*/
    /* function buscaNoticia:                                                                       */
    /* Busca la noticia que se le indica en el argumento 						                    */
    /*                                                                                              */
    /* Argumentos: id de la noticia                                                                 */
    /* Devuelve: true/false                                                                         */
    /*----------------------------------------------------------------------------------------------*/    
    function buscaNoticia($id)
    {
		$respuesta=false;
		$sql = $consulta = $registre = $con = '';

		$con = conectaBBDD();
        $sql="SELECT * FROM noticies WHERE idnoticia = '$id'";
		$consulta = mysqli_query($con, $sql)  or die('Consulta fallida: ' . mysqli_error($con));
		
		if (!empty($consulta))
		{
			$respuesta=true;
			$registre = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
		}	            
		mysqli_close($con);
		return $registre;            
    }
	/*----------------------------------------------------------------------------------------------*/
    /* function actualizarNoticia:                                                                  */
    /* Actualiza el contenido de la noticia que se le pasa por argumento     	                    */
    /*                                                                                              */
    /* Argumentos: id, titulo, contenido, foto                                                      */
    /* Devuelve: true/false                                                                         */
    /*----------------------------------------------------------------------------------------------*/
	function actualizarNoticia($id,$titulo,$contenido,$nombreFichero,$activar)
    {
        $respuesta=false;
		$con = $sql = $consulta = "";
		
		$con = conectaBBDD();
        $sql="UPDATE noticies SET titular='".$titulo."', noticia='".$contenido."', foto='".$nombreFichero."', activo='".$activar."' WHERE idnoticia=".$id;
        $consulta = mysqli_query($con, $sql) or die('Consulta fallida: ' . mysqli_error($con));
		$respuesta=true;
				
		mysqli_close($con);
		return $respuesta;	
    }
	/*----------------------------------------------------------------------------------------------*/
    /* function validaToken:                                                                        */
    /* Busca el token en la tabla     						                                        */
    /*                                                                                              */
    /* Argumentos: token                                                                            */
    /* Devuelve: true/false                                                                         */
    /*----------------------------------------------------------------------------------------------*/
	function validaToken($token)
	{
		$respuesta=false;

		$con = conectaBBDD();
		$sql = "SELECT * FROM tokens WHERE token='$token'";
		$resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
		if (!empty($resultat))
		{
			$respuesta=true;
		}	
				
		//mysql_free_result($resultat);
		mysqli_close($con);
		return $respuesta;	
	}
	/*----------------------------------------------------------------------------------------------*/
    /* function guardarContrasena:                                                                  */
    /* Actualiza la contraseña en la tabla de usuario     						                    */
    /*                                                                                              */
	/* Argumentos: contraseña, token                                              					*/
	/* Devuelve: true/false                                                                         */
    /*----------------------------------------------------------------------------------------------*/
	function guardaContrasena($contrasena,$token)
	{
		$respuesta=false;

		$con = conectaBBDD();
		$sql = "SELECT nom FROM tokens WHERE token='$token'";			
        $consulta = mysqli_query($con, $sql)  or die('Consulta fallida: ' . mysqli_error($con));
		$registre = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
		$usuari = $registre['nom'];
            
        if (!empty($usuari))
		{
            //$tmp=mb_strtolower($usuari, 'UTF-8');
            $tmp_psw=md5(sha1($contrasena));
			$sql = "UPDATE usuari set contrasenya='$tmp_psw' where nom='$usuari'";
			$resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
            $sql="DELETE FROM tokens WHERE token='$token'";
            $resultat = mysqli_query($con, $sql) or die('Consulta fallida: ' . mysqli_error($con));	
            $respuesta=true;
		}					
		
		mysqli_close($con);
		return $respuesta;	
    }
    
    /*----------------------------------------------------------------------------------------------*/
    /* function listado pdf:                                                                        */
    /* Genera el listado de noticias en pdf     						                            */
    /*----------------------------------------------------------------------------------------------*/
	function listadoPDF($total)
	{
        $html= "<h3>NOTICIAS RECIENTES</h3>";
        $html.= "<hr>";
        // dades de configuració
        $con = conectaBBDD();
                
        if ($total<1)
        {
            $sql = "SELECT * FROM noticies WHERE activo=1 ORDER BY data DESC limit 40";
        }
        else
        {
            $sql = "SELECT * FROM noticies n WHERE activo=1 AND n.idnoticia IN (SELECT p.idnoticia FROM pdf p) ORDER BY data DESC limit 40";
        }
        $resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
    
        while ($registre = mysqli_fetch_array($resultat, MYSQLI_ASSOC)) 
        {	
            $html.= "<div style='width:700px;height:300px'>"; 
                $html.= "<div style='float:left;width: 390px;'>";				
                $html.= "<h2>".$registre['titular']."</h2>";
                $html.= "<p style='text-align:justify;margin-right:5px;'>".$registre['noticia']."</p>";
                $html.= "<br>";
                $html.= "<span style='font-size:17px;font-weight:bolder'>".ucwords($registre['autor']).",</span>&nbsp; <span style='font-size:14px'>".formatearFecha($registre['data'])."</span>";
                $html.= "</div>";

                $html.= "<div style='float:right;width: 300px;'>";
                $html.= "<img src='".$registre['foto']."' width='300px' alt='Foto no disponible' >";
                $html.= "</div>";                    
            $html.= "</div>";
            $html.= "<hr style='clear: both;'>";          
        }
                
        if ($total>=1)
        {
            $sql="DELETE FROM pdf";
            $consulta = mysqli_query($con, $sql) or die('Consulta fallida: ' . mysqli_error($con));	
        }

        mysqli_close($con);
        //echo $html;
        return $html;
    }
    /*----------------------------------------------------------------------------------------------*/
    /* function inicioError:                                                                        */
    /* Muestra el error producido al iniciar sesion     						                    */
    /*                                                                                              */
	/* Argumentos: error producido                                              					*/
	/* Devuelve: true/false                                                                         */
    /*----------------------------------------------------------------------------------------------*/
	function inicioError($TextoError)
	{
		$respuesta=true;

		//Validaciones de usuario   
            
        echo "<html>";
            echo "<h1 style='font-size:55px;font-family:century;text-align:center;padding-top:100px'>LOOK</h1>";
            echo "<h2 style='color:red;text-align:center;padding:50px 0'>";
                echo $TextoError;
            echo "</h2>";
            echo "<a href='../index.php'><p style='text-align:center'>Volver al inicio</p></a>";
        echo "</html>";
            
		return $respuesta;	
    }
    /*----------------------------------------------------------------------------------------------*/
    /* function borrarNoticia:                                                                      */
    /* Borra noticia indicada     						                                            */
    /*                                                                                              */
	/* Argumentos: nombre, id noticia, caso                                             			*/
    /*----------------------------------------------------------------------------------------------*/
	function borrarNoticia($nom,$id,$cas)
	{		
		$con = conectaBBDD();
        $sql="DELETE FROM noticies WHERE autor='".$nom."' && idnoticia='".$id."'";
        $consulta = mysqli_query($con, $sql) or die('Consulta fallida: ' . mysqli_error($con));	
        mysqli_close($con);
        if ($cas==1)
        {
            header("Location: look-edita.php");
        }
        else
        {
            header("Location: look-consulta.php");
        }
    }
    function randomPassword($num) 
	{
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < $num; $i++) 
		{
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}
    function buscaTipoUsuario($usuario)
    {
		$respuesta="";
		$tmp = $consulta = $sql = $con = '';
		
        $con = conectaBBDD();
        $tmp=strtolower($usuario);
        //$tmp=mb_strtolower($usuario, 'UTF-8');
        $sql="SELECT nivell FROM usuari WHERE nom = '$tmp'";
		$consulta = mysqli_query($con, $sql)  or die('Consulta fallida: ' . mysqli_error($con));
        $registre = mysqli_fetch_assoc($consulta);
		$respuesta = $registre['nivell'];	
        		
		mysqli_close($con);
		return $respuesta;	
    }  
    
    function getRealIP(){

        if (isset($_SERVER["HTTP_CLIENT_IP"])){

            return $_SERVER["HTTP_CLIENT_IP"];

        }elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){

            return $_SERVER["HTTP_X_FORWARDED_FOR"];

        }elseif (isset($_SERVER["HTTP_X_FORWARDED"])){

            return $_SERVER["HTTP_X_FORWARDED"];

        }elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])){

            return $_SERVER["HTTP_FORWARDED_FOR"];

        }elseif (isset($_SERVER["HTTP_FORWARDED"])){

            return $_SERVER["HTTP_FORWARDED"];

        }else{

            return $_SERVER["REMOTE_ADDR"];

        }
    }       
    function cuentaHoras($inicio,$final)
    {
        $sql = $resultat = $registre = $con = '';

        $con = conectaBBDD();
        $sql = "SELECT COUNT(*) as VH FROM contador WHERE horau >= $inicio && horau < $final";
		$resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
        $registre = mysqli_fetch_assoc($resultat);
        mysqli_close($con);
        return $registre['VH'];
    }
    function cuentadias($dia)
    {
        $sql = $resultat = $registre = $con = '';
        $con = conectaBBDD();
        $sql = "SELECT COUNT(*) as tmp FROM contador WHERE dia = '$dia'";
		$resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
        $registre = mysqli_fetch_assoc($resultat);
        mysqli_close($con);
        return $registre['tmp'];
    }
    function cuentaDatosMes($tabla,$columna,$mes)
    {
        $respuesta=false;
		$sql = $consulta = $registre = $con = '';

		$con = conectaBBDD();
        $sql="SELECT COUNT(*) as tmp FROM $tabla WHERE DATE_FORMAT($columna,'%m') = $mes";
		$resultat = mysqli_query($con, $sql)  or die('Consulta fallida: ' . mysqli_error($con));
		$registre = mysqli_fetch_assoc($resultat);		
		mysqli_close($con);
        return $registre['tmp']; 
    }
    	/*----------------------------------------------------------------------------------------------*/
    /* function buscaCorreo:                                                                       */
    /* Busca el correo que se le indica en el argumento 						                    */
    /*                                                                                              */
    /* Argumentos: nombre usuario                                                                 */
    /* Devuelve: true/false                                                                         */
    /*----------------------------------------------------------------------------------------------*/    
    function buscaCorreo($usuario)
    {
		$respuesta=false;
		$sql = $consulta = $registre = $con = '';

		$con = conectaBBDD();
        $sql="SELECT correu FROM usuari WHERE nom = '$usuario'";
		$consulta = mysqli_query($con, $sql)  or die('Consulta fallida: ' . mysqli_error($con));
		
		if (!empty($consulta))
		{
			$respuesta=true;
			$registre = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
		}	            
		mysqli_close($con);
		return $registre;            
    }
  

?>