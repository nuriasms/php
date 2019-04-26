<?php

	function generarFecha()
	{
		$fecha= date ("Y-n-j");
		return $fecha;
	}

	function generarFechaAleatoria()
	{
		$aleatorio=mt_rand(315569,15778450);
		return date("Y-n-j",$aleatorio);
	}

	function compararFecha($valor1,$valor2)
	{
		$data1=date_create($valor1);
		$data2=date_create($valor2);
		$interval = date_diff($data1, $data2);
		return $interval;	
	}

	function fechaMayor($valor1,$valor2)
	{
		$data1=strtotime($valor1);
		$data2=strtotime($valor2);

		if ($data1>$data2) return "mayor";
		if ($data1<$data2) return "menor";
		if ($data1=$data2) return "igual";
	}


	function formatearFecha($data,$pais)
	{
		if ($pais=="EUR")
		{
			$dia=substr($data,0,2);
			$mes=substr($data,3,2);
			$ano=substr($data,6,4);
		}

		if ($pais=="USA")
		{
			$mes=substr($data,0,2);
			$dia=substr($data,3,2);
			$ano=substr($data,6,4);
		}

		

		if (checkdate($mes,$dia,$ano))
		{
			if ($pais=="USA")
			{
				$fecharetorno=$dia."-".$mes."-".$ano;
			}
			if ($pais=="EUR")
			{
				$fecharetorno=$mes."/".$dia."/".$ano;
			}
			echo $fecharetorno;
			return $fecharetorno;
		}
		else
		{
			return "error";
		}
	}

	function formatearFechaCarta()
	{
		$data= strtotime("24-04-2019");
		//setlocale(LC_TIME,'es_ES');
		//UGII_LANG=spanish //en XAMPP
		setlocale(LC_TIME,'spanish');
		//return iconv("iso-8859-1","utf-8",(ucfirst(strftime("%A, %d de %B de %Y", $data))));
		return utf8_encode(ucfirst(strftime("%A, %d de %B de %Y", $data)));
		//return ucfirst(strftime("%#x", $data));
		
	}

	function generarXifrat($valor)
	{
		$tmp=sha1($valor);
		$xifrat=md5($tmp);
		return $xifrat;
	}

	function comprobarContrasena($valor)
	{
		$respuesta="INCORRECTA";
		if (md5(sha1($valor)) === 'f019b8c91690a9af328787b4a0eaee23') {
		    $respuesta="CORRECTA";
		}
		return $respuesta;
	}
?>
