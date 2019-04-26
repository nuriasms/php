<!DOCTYPE html>
<html lang="eS">
	<head>
		<meta charset="UTF-8">
		<title>tablas</title>
		<style>
			h1{
				color:red;
			}
			table, td{
				border:1px solid black;
				border-collapse: collapse;
			}
			td:nth-child(odd){
				background-color:gray;
			}
			td:nth-child(even){
				background-color:#c5c5c5;
			}
		</style>
	</head>
	<body>
		<?PHP
			print("<h1>Tablas de multiplicar</h1>");

			$x=1;
			print("<table>\n");
			while ($x<=10)
			{
				print("<tr>\n");
				$x++;
				$i=1;
				while ($i<=10)
				{
					print("<td>".$i." * ".$x." = "."</td>\n");
					print("<td>".$i*$x."</td>\n");
					$i++;
				}
				print("</tr>\n");
			}
			print("</table>\n");
		?>

		<?PHP
			print("<h1>Tablas de multiplicar individuales</h1>");
			$y=1;
			while($y<=10)
			{		
				$x=1;
				print("<h3>Tabla ".$y."</h3>");
				print("<table>\n");
				while ($x<=10)
				{	
					print("<tr>\n");										
					print("<td>".$y." * ".$x." = "."</td>\n");
					print("<td>".$y*$x."</td>\n");									
					print("</tr>\n");
					$x++;
				}
				print("</table>\n");
				$y++;
			}
		?>
	</body>
</html>