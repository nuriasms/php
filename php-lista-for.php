<!DOCTYPE html>
<html lang="eS">
	<head>
		<meta charset="UTF-8">
		<title>tablas</title>
		<style>
			h1{
				color:red;
			}
			ul li{
				list-style: none;
			}
		</style>
	</head>
	<body>
		<?PHP
			print("<h1>Tablas de multiplicar</h1>");
			for($x=1; $x<=10; $x++)
			{
				print("<h3>Tabla".$x."</h3>");
				print("<ul>\n");
				for($i=1; $i<=10; $i++)
				{
					print("<li>".$x." * ".$i." = ".$x*$i."</li>\n");
				}
				print("</ul>\n");
			}
		?>

	</body>
</html>