
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">  
  			<label>Nombre *: </label><input type="text" name="nombre" value="<?php echo $nombre;?>">
  			<span class="error"><?php echo $nombreError;?></span>
  			<br><br>
				<label>Apellidos: </label><input type="text" name="apellidos" value="<?php echo $apellidos;?>">
  			<span class="error"><?php echo $apellidosError;?></span>
  			<br><br>
				<label>Edad: </label><input type="number" name="edad" value="<?php echo $edad;?>">
  			<span class="error"><?php echo $edadError;?></span>
  			<br><br>
				<label>Correo *: </label><input type="email" name="correo" value="<?php echo $correo;?>">
  			<span class="error"><?php echo $correoError;?></span>
  			<br><br>
				<label>Comentarios: </label><textarea name="comentarios" rows="5" cols="40"><?php echo $comentarios;?></textarea>
				<br><br>
				<label>Datos adjuntos: </label>
				<input type="hidden" name="max_file_size" value="102400">
				<input type="file" name="fichero">
  			<span class="error"><?php echo $ficheroError;?></span>
              <input type="hidden" name="id" value="<?php echo $id;?>">
				<br><br><br>
        
