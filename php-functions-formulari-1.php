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


?>