<?php

	function generaArray($valor)
	{
		$cadena=array();
		for ($i=0; $i < $valor; $i++) 
		{ 
			$cadena[$i]=rand(0,100);
		}
		return $cadena;
	}

	function calcular($cadena,$ope)
	{
		$valor=0;
		$valor=$cadena[0];
		for ($i=0; $i < count($cadena); $i++) 
		{ 
			switch ($ope)
			{
				case '>':
					if ($cadena[$i]>$valor)
					{
						$valor=$cadena[$i];
					}					
					break;
				case '<':
					if ($cadena[$i]<$valor)
					{
						$valor=$cadena[$i];
					}					
					break;
				case '+':
					$valor+=$cadena[$i];
					break;
			}
		}
		return $valor;
	}

/*-------------------------MAIN--------------------------------------------------*/

	print("El contenido de cadena es: <br>");
	$cadenaRetorno=generaArray('10');
	print_r($cadenaRetorno);
	
	print("<br>El valor máximo de cadena es: ".calcular($cadenaRetorno,'>')."<br>");
	print("<br>El valor mínimo de cadena es: ".calcular($cadenaRetorno,'<')."<br>");
	print("<br>La suma de la cadena es: ".calcular($cadenaRetorno,'+')."<br>");
?>