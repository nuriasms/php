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
				//printf ("REGISTRO:".$registre[id]."<br>");
				echo "<td><a href='editar.php?id=$registre[id]'>Editar</a></td>";
				echo "<td><a href='borrar.php?id=$registre[id]'>Borrar</a></td>";
				echo "</tr>";
			}
			echo "</table>";		
			$respuesta=true;	
		}
		//mysql_free_result($resultat);
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

	

?>