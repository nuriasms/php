<?php

	if(isset($_REQUEST["nombre"]))
	{
		if ($_REQUEST["nombre"]=="Alejandro")
		{
			?>
			<form method="POST" action="pphp.php" >
					<p>Nombre de usuario: <input name="nombre"  type="text" value="Falta nombre" ></p>
			</form>
			<?php
			echo "Obligatorio introducir el nombre";
			?>
			<a href="javascript:history.go(-1);">Volver Atras</a>
			<?php
		}
		else
		{
			?>
			<h2>Gracias!</h2> 
			<?php print $_REQUEST["nombre"]; ?>
			<p>Tu mensaje ha sido enviado, pronto nos pondremos en contacto contigo</p>
			<br> 
			<br> 
			<a href="javascript:history.go(-1);">Volver Atras</a> 
			<br> 
			<br> 
			<a href="http://localhost/desenvolupament/php/pp.html">Volver Pagina inicio</a> 
			<?php
		}

	}
	else
	{
		echo "Error al tramitar el formulario";
		header('Location: pp.html');

	}
?>

