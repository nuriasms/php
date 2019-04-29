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

	function validarUsuario($nombre,$contrasena)
	{
		$respuesta=false;
		if (($nombre==="USER") && ($contrasena==="PASSWORD")) $respuesta=true;
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
           $error = $error." un carácter especial";
       	}
       	if ((strlen($clau) < 6) || (strlen($clau) > 12))
       	{
           $error = $error." entre 8 o 12 carácteres, ";
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
	


?>