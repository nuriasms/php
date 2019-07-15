<?php
    session_start();
    require ('../php/funciones.php');
	$usuario=validarSesionAbierta(); 

    if(isset($_REQUEST["cerrar"])) 
    {	
        cerrarSesion();
    }  
?>

<!DOCTYPE html>
	<html lang="en">
	<head>
		<?php
			require ('../html/head.html');
		?>	
	</head>
	<body>
		<noscript>Disculpe, su navegador no soporta JavaScript!</noscript>
		<!----------------------------------CABECERA------------------------------------------------>
		<?php
			include ('../html/cabecera.html');
		?>
		<!---------------------------------BARRA NAVEGACIÓN------------------------------------------>
		
		<?php
			$opcio="menu4";
			$barra="look";
			include ('../html/barra.html');
		?>
<!----------------------------AVISO MENÚ NO ACTIVO -------------------------------------------->
        
        <div class="erroradmin">                        
            <h2>AVISO:</h2>
            <h2>ACCESO DENEGADO</h2>
            <br>
            <p><b>Para acceder a este menú debe tener permisos especiales.</b></p>
            <br>
            <p>Si requiere su acceso, pongase en contacto con su administrador.</p>
            <br>					
        </div> 
        <?php
			include ('../html/pie.html');
		?>    
    </body>
</html>