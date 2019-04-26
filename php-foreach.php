<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>array</title>
	</head>
	<body>
		<?PHP
			$numeros=array();
            $resultat=0;
            for($i=0;$i<10;$i++) 
			{
				//echo "<br>$i:".rand(0,1);
				$numeros[]=rand(0,100);
				$resultat+=$numeros[$i];				
			}
			print("El resultado de la suma es: ".$resultat."<br><br>");
			print("Contenido del array:<br>");
			print_r($numeros);
			print("<br><br>");

			$min=$numeros[0];			
			for ($x=1;$x<10;$x++)
			{
				if ($numeros[$x]<$min)
				{
					$min=$numeros[$x];
				}
			}
			print("El valor mínimo es: ".$min."<br><br>");

			$max=$numeros[0];			
			//for($i=0;$i<10;$i++) los dos for funcionan igual
			for($i=0;$i<count($numeros);$i++)
			{
				if ($numeros[$i]>$max)
				{
					$max=$numeros[$i];
				}
			}
			print("El valor máximo es: ".$max."<br><br>");

			/*---------------------------------------------------------------------------*/

			/*$i=0;		
			$cadena=array("valor_0"=>rand(0,100));
			foreach ($cadena as $valor=>$num)
			{
				if ($i<10)
				{
					$cadena=array("valor_".$i++=>rand(0,100));
					$i++;
				}
			}*/		
			
        	/*$i=0;
        	$cadena=array("valor_".$i++=>rand(0,100),"valor_".$i++=>rand(0,100),"valor_".$i++=>rand(0,100),"valor_".$i++=>rand(0,100),"valor_".$i++=>rand(0,100),"valor_".$i++=>rand(0,100),"valor_".$i++=>rand(0,100),"valor_".$i++=>rand(0,100),"valor_".$i++=>rand(0,100),"valor_".$i++=>rand(0,100));*/

			$cadena=array();	
        	for($i=0;$i<10;$i++)
			{
                $nom="valor_".$i;
				$cadena[$nom]=rand(0,100);
			}	   
            print("<br>El contenido de la cadena es: <br>");
            var_dump($cadena);
        
            $min=$cadena['valor_0'];
            foreach ($cadena as $valor=>$num) 
			{
    			if ($num<$min)
				{
					$min=$num;
				}                
			}
            print("<br>El valor mínimo es: ".$min."<br>");		

			$max=$cadena['valor_0'];			
			foreach ($cadena as $valor=>$num)
			{
				if ($num>$max)
				{
					$max=$num;
				}
			}
			print("<br>El valor máximo es: ".$max."<br>");

			/*----------------------------------------------------------------------*/

			$numeros=array();
            $resultat=0;
            for($i=0;$i<10;$i++) 
			{
				//echo "<br>$i:".rand(0,1);
				$numeros[]=rand(0,100);
				$resultat+=$numeros[$i];				
			}

			
			foreach($numeros as $numero)
			{			
				$resultat+=$numero;				
			}
			print("El resultado de la suma es: ".$resultat."<br><br>");
			print("Contenido del array:<br>");
			print_r($numeros);
			print("<br><br>");

			$min=$numeros[0];
            foreach ($numeros as $numero) 
			{
    			if ($numero<$min)
				{
					$min=$numero;
				}                
			}
            print("<br>El valor mínimo es: ".$min."<br>");		

			$max=$numeros[0];
            foreach ($numeros as $numero) 
			{
    			if ($numero>$max)
				{
					$max=$numero;
				}                
			}
			print("<br>El valor máximo es: ".$max."<br>");

			/*--------------------------------------------------------------------------*/

			$valor1=max($numeros);
			$valor2=min($numeros);
			print("<br>El valor máximo es: ".$valor1."<br> <br>El valor mínimo es: ".$valor2);

			
		?>
	</body>
</html>
