<?php
    require ('../php/funciones.php');

    echo "<h2>NOTICIAS RECIENTES</h2>";
    echo "<hr>";
	
	// dades de configuració
	$ip = 'localhost';
	$usuari = 'prova';
	$password = 'prova';
	$db_name = 'prova';
	// connectem amb la db
	$con = mysqli_connect($ip,$usuari,$password,$db_name);
	if (!$con)  
	{
		echo "Ha fallat la connexió a MySQL: " . mysqli_connect_errno();
		echo "Ha fallat la connexió a MySQL: " . mysqli_connect_error();
	}
	else
	{	
		$sql = "SELECT * FROM noticies";
		$resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
			
		while ($registre = mysqli_fetch_array($resultat, MYSQLI_ASSOC)) 
		{	
            echo "<div style='width:800px;height:310px;margin-left:20px;'>";
                echo "<div style='float:left;width: 500px;'>";				
                    echo "<h3>".utf8_encode($registre['titular'])."</h3>";
                    echo "<br>";
                    echo "<p>".utf8_encode($registre['noticia'])."</p>";
                    echo "<br><br>";
                    echo "<h5><span>".utf8_encode(ucwords($registre['autor']))."&nbsp; ".formatearFecha($registre['data'])."</span></h5>";
                echo "</div>";
                echo "<div style='float:right;width: 300px;'>";
                    echo "<img src='".$registre['foto']."' width='300px' alt='Foto no disponible' align='middle'>";
                echo "</div>";
                
            echo "</div>";
            echo "<hr>"; 
        }
    }
?>