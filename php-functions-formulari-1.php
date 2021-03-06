<?php
	function validarFrase($frase) 
	{
		$encadenada=true;
		$palabras=explode(" ",$frase);
		for ($i=0; $i<count($palabras)-1; $i++) 
		{ 
			$primeraPalabra=$palabras[$i];
			$segundaPalabra=$palabras[$i+1];

			$silabaUltimaPrimera=substr($primeraPalabra,-2);
			$silabaPrincipioSegunda=substr($segundaPalabra,0,2);
			
			if ($silabaUltimaPrimera!=$silabaPrincipioSegunda)
			{
				$encadenada=false;
				break;
			}	

		}
		return $encadenada;
	}

	function calcular()
	{
		switch ($_POST["operacion"]) 
		{
			case 'suma':
				$resultado=$_POST["primero"]+$_POST["segundo"];
				break;
			case 'resta':
				$resultado=$_POST["primero"]-$_POST["segundo"];
				break;
			case 'multiplicacion':
				$resultado=$_POST["primero"]*$_POST["segundo"];
				break;
			case 'division':
				$resultado=$_POST["primero"]/$_POST["segundo"];
				break;
			default:
				$resultado="ERROR";
				break;
		}
		return $resultado;
	}

	function calcular2()
	{
		switch ($_POST["operacion"]) 
		{
			case '+':
				$resultado=$_POST["primero"]+$_POST["segundo"];
				break;
			case '-':
				$resultado=$_POST["primero"]-$_POST["segundo"];
				break;
			case '*':
				$resultado=$_POST["primero"]*$_POST["segundo"];
				break;
			case '/':
				$resultado=$_POST["primero"]/$_POST["segundo"];
				break;
			default:
				$resultado="ERROR";
				break;
		}
		return $resultado;
	}

	function validarUsuarioAqui($nombre,$contrasena)
	{
		$respuesta=false;
		if (($nombre==="USER") && ($contrasena==="PASSWORD")) $respuesta=true;
		return $respuesta;	
	}

	function validarUsuario($nombre,$contrasena)
	{
		$respuesta=false;
		// dades de configuració
		$ip = 'localhost';
		$usuari = 'root';
		$password = '';
		$db_name = 'valida_login';

		// connectem amb la db
		$con = mysqli_connect($ip,$usuari,$password,$db_name);
		if (!$con)  
		{
			echo "Ha fallat la connexió a MySQL: " . mysqli_connect_errno();
			echo "Ha fallat la connexió a MySQL: " . mysqli_connect_error();
		}
		else
		{
			$sql="SELECT nom, contrasenya FROM usuari WHERE nom = '$nombre' AND contrasenya = '$contrasena'";
			$consulta = mysqli_query($con, $sql)  or die('Consulta fallida: ' . mysqli_error($con));
			if (mysqli_num_rows($consulta) > 0)
			{
				$respuesta=true;
			}
		}
		mysqli_close($con);
		return $respuesta;	
	}

	function altaUsuario($nombre,$apellido,$edad,$correo,$comentario,$fichero)
	{
		$respuesta=false;
		// dades de configuració
		$ip = 'localhost';
		$usuari = 'root';
		$password = '';
		$db_name = 'valida_login';

		// connectem amb la db
		$con = mysqli_connect($ip,$usuari,$password,$db_name);
		if (!$con)  
		{
			echo "Ha fallat la connexió a MySQL: " . mysqli_connect_errno();
			echo "Ha fallat la connexió a MySQL: " . mysqli_connect_error();
		}
		else
		{
			$sql="insert into formulariv4 (nombre,apellido,edad,correo,comentarios,fichero) values ('$nombre','$apellido','$edad','$correo','$comentario','$fichero')";
			$consulta = mysqli_query($con, $sql) or die('Consulta fallida: ' . mysqli_error($con));
			$respuesta=true;	
		}
		mysqli_close($con);
		return $respuesta;	
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
		   
		/* if (!preg_match('/[.,=:|&\+\^$\*-_]+/',$clau)) 
       	{
           $error = $error." un carácter especial";
       	}*/
	   	return $error;
	}  
	
	function validarFichero()
	{
		$nombre="";
		if (is_uploaded_file($_FILES['fichero']['tmp_name']))
		{ //si se ha subido el fichero….
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
			//print ($nombre);
		}
		else
		{
			//print("No se ha podido subir el fichero\n");
			
		}
		return $nombre;
	}

	function modificarUsuario($id,$nombre,$apellido,$edad,$correo,$comentario)
	{
		$respuesta=false;
		// dades de configuració
		$ip = 'localhost';
		$usuari = 'root';
		$password = '';
		$db_name = 'valida_login';

		// connectem amb la db
		$con = mysqli_connect($ip,$usuari,$password,$db_name);
		if (!$con)  
		{
			echo "Ha fallat la connexió a MySQL: " . mysqli_connect_errno();
			echo "Ha fallat la connexió a MySQL: " . mysqli_connect_error();
		}
		else
		{
			$sql="update formulariv4 set nombre='$nombre', apellido='$apellido', edad='$edad', correo='$correo', comentarios='$comentario' where id='$id'";
			//echo " $sql";
			$consulta = mysqli_query($con, $sql) or die('Consulta fallida: ' . mysqli_error($con));
			$respuesta=true;	
		}
		mysqli_close($con);
		return $respuesta;	
	}

	function borrarUsuario($id,$nombre,$apellido,$edad,$correo,$comentario)
	{
		$respuesta=false;
		// dades de configuració
		$ip = 'localhost';
		$usuari = 'root';
		$password = '';
		$db_name = 'valida_login';

		// connectem amb la db
		$con = mysqli_connect($ip,$usuari,$password,$db_name);
		if (!$con)  
		{
			echo "Ha fallat la connexió a MySQL: " . mysqli_connect_errno();
			echo "Ha fallat la connexió a MySQL: " . mysqli_connect_error();
		}
		else
		{
			$sql="delete from formulariv4 where id='$id'";
			//echo " $sql";
			$consulta = mysqli_query($con, $sql) or die('Consulta fallida: ' . mysqli_error($con));
			$respuesta=true;	
		}
		mysqli_close($con);
		return $respuesta;	
	}

	function conexionBBDD()
	{
		$respuesta=false;
		// dades de configuració
		$ip = 'localhost';
		$usuari = 'root';
		$password = '';
		$db_name = 'valida_login';

		// connectem amb la db
		$con = mysqli_connect($ip,$usuari,$password,$db_name);
		if (!$con)  
		{
			echo "Ha fallat la connexió a MySQL: " . mysqli_connect_errno();
			echo "Ha fallat la connexió a MySQL: " . mysqli_connect_error();
		}
		else
		{			
			$respuesta=true;	
		}
		return $respuesta;	
	}	

	function cerrarBBDD($con)
	{
		mysqli_close($con);
	}

	function consultaBBDD()
	{
		$respuesta=false;
		// dades de configuració
		$ip = 'localhost';
		$usuari = 'root';
		$password = '';
		$db_name = 'valida_login';

		// connectem amb la db
		$con = mysqli_connect($ip,$usuari,$password,$db_name);
		if (!$con)  
		{
			echo "Ha fallat la connexió a MySQL: " . mysqli_connect_errno();
			echo "Ha fallat la connexió a MySQL: " . mysqli_connect_error();
		}
		else
		{	
			$sql = "SELECT * FROM formulariv4";
			$resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
			echo "<table>";
			while ($registre = mysqli_fetch_array($resultat, MYSQLI_ASSOC)) 
			{
				echo "<tr>";
				// només si volem mostrar tots els camps de la consulta
				foreach ($registre as $col_value) 
				{
					echo "<td>$col_value</td>";
				}
				//printf ("REGISTRO:".$registre[id]."<br>"); Mostra totes les dades juntes
				//Confirmación borrado mediante pregunta formulario, descomentar
				//echo "<td><a href='editar.php?id=$registre[id]'>Editar</a></td>";
				//echo "<td><a href='borrar.php?id=$registre[id]'>Borrar</a></td>";
				
				echo "<td><a href='editar.php?id=$registre[id]'><button type='button' class='btn btn-default'><span class='glyphicon glyphicon-pencil'></span></button></a></td>";
				// Aquesta línea es correcte. Un altra manera de fer-ho
				//echo "<td><a href='borrar.php?id=".$registre['id']."' onClick=\"javascript:return confirm('¿Estás seguro de que quiere eliminar este elemento?');\"><button type='button' class='btn btn-default'><span class='glyphicon glyphicon-trash'></span></button></a></td>";
				echo "<td><a href='borrar.php?id=$registre[id]' onClick=\"return confirm('¿Estás seguro de que quiere eliminar este elemento?');\"><button type='button' class='btn btn-default'><span class='glyphicon glyphicon-trash'></span></button></a></td>";
				echo "</tr>";
			}
			echo "</table>";		
			$respuesta=true;	
		}
		//mysql_free_result($resultat);
		mysqli_close($con);
		return $respuesta;	

	}

	function randomPassword() {
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 4; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}


	function recuperarContrasena($nom,$correu)
	{
		$respuesta=false;
		// dades de configuració
		$ip = 'localhost';
		$usuari = 'root';
		$password = '';
		$db_name = 'valida_login';
		$nova_pass= '';

		// connectem amb la db
		$con = mysqli_connect($ip,$usuari,$password,$db_name);
		if (!$con)  
		{
			echo "Ha fallat la connexió a MySQL: " . mysqli_connect_errno();
			echo "Ha fallat la connexió a MySQL: " . mysqli_connect_error();
		}
		else
		{		
			$sql = "SELECT contrasenya FROM usuari WHERE nom='$nom'";
			$resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
			if (!empty($resultat))
			{
				$nova_pass=randomPassword();
				$sql="update usuari set contrasenya='$nova_pass' where nom='$nom'";
				$resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
				header("Location: sql-correo.php?pass=".$nova_pass."&nom=".$nom."&correu=".$correu);
				$respuesta=true;
			}	
				
		}
		//mysql_free_result($resultat);
		mysqli_close($con);
		return $respuesta;	
	}

	function generarToken($nom)
	{
		$token = $resetPassLink = '';
		// dades de configuració
		$ip = 'localhost';
		$usuari = 'root';
		$password = '';
		$db_name = 'valida_login';
		$nova_pass= '';

		// connectem amb la db
		$con = mysqli_connect($ip,$usuari,$password,$db_name);
		if (!$con)  
		{
			echo "Ha fallat la connexió a MySQL: " . mysqli_connect_errno();
			echo "Ha fallat la connexió a MySQL: " . mysqli_connect_error();
		}
		else
		{		
			$sql = "SELECT contrasenya FROM usuari WHERE nom='$nom'";
			$resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
			if (!empty($resultat))
			{
				//genera cadena única
				$token = md5(uniqid(mt_rand()));
				$temps = getdate();
				$sql="INSERT token VALUES (null,'$token','$temps',null,'$nom')";
				$resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
			}			
		}
		mysqli_close($con);
		return $token;	
	}

	validaToken($token)
	{
		$respuesta=false;
		// dades de configuració
		$ip = 'localhost';
		$usuari = 'root';
		$password = '';
		$db_name = 'valida_login';
		$nova_pass= '';

		// connectem amb la db
		$con = mysqli_connect($ip,$usuari,$password,$db_name);
		if (!$con)  
		{
			echo "Ha fallat la connexió a MySQL: " . mysqli_connect_errno();
			echo "Ha fallat la connexió a MySQL: " . mysqli_connect_error();
		}
		else
		{		
			$sql = "SELECT * FROM token WHERE token='$token'";
			$resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
			if (!empty($resultat))
			{
				$respuesta=true;
			}	
				
		}
		//mysql_free_result($resultat);
		mysqli_close($con);
		return $respuesta;	
	}

	guardaContrasena($contrasena,$token)
	{
		$respuesta=false;
		// dades de configuració
		$ip = 'localhost';
		$usuari = 'root';
		$password = '';
		$db_name = 'valida_login';
		$nova_pass= '';

		// connectem amb la db
		$con = mysqli_connect($ip,$usuari,$password,$db_name);
		if (!$con)  
		{
			echo "Ha fallat la connexió a MySQL: " . mysqli_connect_errno();
			echo "Ha fallat la connexió a MySQL: " . mysqli_connect_error();
		}
		else
		{		
			$sql = "SELECT usuari FROM token WHERE token='$token'";
			$usuari = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
			if (!empty($usuari))
			{
				$sql = "UPDATE usuari set contrasenya='$contrasenya' where nom='$usuari'";
				$resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
				$respuesta=true;
			}	
				
		}
		//mysql_free_result($resultat);
		mysqli_close($con);
		return $respuesta;	

	}

?>