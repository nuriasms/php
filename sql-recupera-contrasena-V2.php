<?php
	require ('php-functions-formulari-1.php');
?>
<!DOCTYPE html>
<html>
    <body>
        <?php
            $correo = $correoError = '';
            $estado=true;
            
            if(isset($_REQUEST["envia"])) 
			{	
                
                if (empty($_REQUEST["correo"])) 
                {
                    $correoError = "Correo obligatorio";
                    $estado=false;
                } 
                else 
                {
                    $correo = test_input($_REQUEST["correo"]);
                    // Comprueba que el formato es correcto
                    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) 
                    {
                        $correoError = "Formato de correo erróneo";
                        $estado=false; 
                    }
                }
                
                if ($estado)
                {
                    header("Location: sql-correo-V2.php?nom=".$_REQUEST["nombre"]."&correu=".$correo);
                }
            }
        ?>
        <h3>Recuperación de contraseña</h3>
        <form method="post">
            <label>Indica tu email para la recuperación: </label>
            <br><br>
            <input type="email" name="correo" value="<?php echo $correo;?>">
            <span class="error"><?php echo $correoError;?></span>
            <br><br>
            <input type="submit" name="envia" value="Enviar">
			<br><br>
        </form>
    </body>
</html>
