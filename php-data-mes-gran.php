<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Data mes gran</title>
		<?php
			require ('php-functions-data-mes-gran.php');
		?>
		<style>
			.verde{
				color:green;
			}
			.rojo{
				color:red;
			}
		</style>
	</head>
	<body>
		<?php
			$fecha1=generarFecha();
			print("Fecha del sistema: <br>".$fecha1."<br>");
			$fecha2=generarFechaAleatoria();
			print("Fecha aleatoria del sistema: <br>".$fecha2."<br>");

			$interval=compararFecha($fecha1,$fecha2);
			echo $interval->format('%R%a días de diferencia');
			
			//date('%R%a días ',$interval)

			print("<br>El ".$fecha1." es ".fechaMayor($fecha1,$fecha2)." a ".$fecha2."<br>");

			$pais="USA";
			$fecha="04/23/2019";
			print("<br>La fecha actual en formato EUR es: ".formatearFecha($fecha,$pais)."<br>");
			$pais="EUR";
			$fecha="23-04-2019";
			print("<br>La fecha actual en formato USA es: ".formatearFecha($fecha,$pais)."<br>");
			
			print("<br>La fecha formato carta es: ".formatearFechaCarta()."<br>");
			
			$contrasena="seguretat.1234";
			$xifrat=generarXifrat($contrasena);
			$respuesta=comprobarContrasena($contrasena);
			if ($respuesta=="CORRECTA")
			{
				print("<br>¿La contraseña es correcta? <span class='verde'>".$respuesta."</span><br>");
			}
			else
			{
				print("<br>¿La contraseña es correcta? <span class='rojo'>".$respuesta."</span><br>");
			}


		?>
		
	</body>
</html>