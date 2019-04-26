<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ubir fichero</title>
    </head>
    <body>
    <?php
			if(isset($_REQUEST[""]))
			{	
				
						
					
				?>
				<br><br>
				<a href="javascript:history.go(-1);">Volver Atras</a>			
			<?php
			}
			else
			{
				?>
				<form acton="" method="post" ENCTYPE="multipart/formdata“ >
					<label>Nombre: <input type="text" name="nombre" placeholder="login"></label><br>
					<label>Contraseña: <input type="text" name="contrasena" placeholder="password"></label>
					<br><br>
					<in
					
					<input type="submit" name="enviar" value="Aceptar">
					
					
				</form>
				<?php
			}
		?>
    </body>
</html>