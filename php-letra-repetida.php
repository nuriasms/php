<?php
	
	function cuentaLetras($cadena)
	{		
		$letras=str_split($cadena);		
		$elemento=array();
		$contador=0;
		for ($x=0; $x < count($letras); $x++) 
		{ 
			$primera=$letras[$x];
			for($i=0;$i<count($letras);$i++)
			{
	                if ($letras[$i]==$primera)
	                {
	                	$contador++;
	                }
			}
			$val=$letras[$x];
			$elemento[$val]=$contador;
            $contador=0;	
		}	
		return($elemento);
	}

	function maxim($cadena)
	{
		$valor=0;
		$caracter=0;
		$tmp=0;
		$tmp=array_keys($cadena);
		$valor=$tmp[0];
		
		foreach ($cadena as $letras=>$primera) 
		{
			if ($primera>$valor)
			{
				$valor=$primera;
				$caracter=$letras;
			}					
		}
		foreach ($cadena as $letras=>$primera) 
		{
			if ($primera>$valor)
			{
				$valor=$primera;
				$caracter=$letras;
			}					
		}

		$respuesta=array($caracter,$valor);
		return $respuesta;
	}

	function minim($cadena)
	{
		$valor=0;
		$caracter=0;
		$tmp=0;
		$tmp=array_values($cadena);
		$valor=$tmp[0];
		
		foreach ($cadena as $letras=>$primera) 
		{
			if ($primera<$valor)
			{
				$valor=$primera;
				$caracter=$letras;					
			}
		}
		$respuesta=array($caracter,$valor);
		return $respuesta;
	}


	function minimSimple($cadena)
	{
		$valor=0;
		$caracter=0;
		$tmp=0;
		
		foreach ($cadena as $letras=>$primera) 
		{
			if ($tmp==0) {
				$valor=$primera;
				$tmp=1;
			}
			if ($primera<$valor)
			{
				$valor=$primera;
				$caracter=$letras;					
			}
		}
		$respuesta=array($caracter,$valor);
		return $respuesta;
	}


	function calcular($cadena,$ope)
	{
		$valor=0;
		$caracter=0;
		$tmp=0;
		
		foreach ($cadena as $letras=>$primera) 
		{
			if ($tmp==0) {
				$valor=$primera;
				$tmp=1;
			}
			switch ($ope)
			{
				case '<':
				{
					if ($primera<$valor)
					{
						$valor=$primera;
						$caracter=$letras;					
					}
					break;
				}
				case '>':
					{
						if ($primera>$valor)
						{
							$valor=$primera;
							$caracter=$letras;
						}	
						break;			
					}
			}
		}
		$respuesta=array($caracter,$valor);
		return $respuesta;
	}



	/*------------------------------------MAIN------------------------------------------------*/

	$texto="holaholhoh";
	print("En la cadena ' ".$texto." ' tiene el número de letras:<br> <br>");
	print_r(cuentaLetras($texto));

	$respuesta=cuentaLetras($texto);
	print("<br><br>La letra que más aparece es: ");
	print_r(maxim($respuesta));
	print("<br><br>La letra que menos aparece es: ");
	print_r(minim($respuesta));

	print("<br>La letra que menos aparece es: ");
	print_r(minimSimple($respuesta));

	print("<br><br>La letra que más aparece es: ");
	print_r(calcular($respuesta,'>'));
	print("<br><br>La letra que menos aparece es: ");
	print_r(calcular($respuesta,'<'));

?>