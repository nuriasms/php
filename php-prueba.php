<!DOCTYPE html>
<html lang="eS">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>
	<body>
		<h1>PHP y HTML</h1>
		<p>Este es el parrafo 1, escrito desde HTML</p>	
		<?PHP
		/*phpinfo(); */
			print ("<p>Éste es el parrafo 2, escrito desde PHP</p>");
		?>
		<p>Este es el parrafo 3, escrito desde HTML</p>	
		<?PHP
			print ("<p>Éste es el parrafo 4, escrito desde PHP</p>");
		?>
		<?PHP
			$mensaje_es="Hola";
			$mensaje_en="Hello";
			$idioma1= "es"; 
			$mensaje= "mensaje_" . $idioma1;
			print ("El valor en ingles es ".$$mensaje.".\n"); 
			$idioma2= "en"; 
			$mensaje= "mensaje_" . $idioma2;
			print ("El valor en ingles es ".$$mensaje." \n"); 
		?>
	</body>
</html>


