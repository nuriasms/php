<?php

		$bufferHTML= $nom = '';
        $ip = 'localhost';
		$usuari = 'root';
		$password = '';
		$db_name = 'empresa';

		// connectem amb la db
		$con = mysqli_connect($ip,$usuari,$password,$db_name);
		if (!$con)  
		{
			echo "Ha fallat la connexió a MySQL: " . mysqli_connect_errno();
			echo "Ha fallat la connexió a MySQL: " . mysqli_connect_error();
		}
		else
		{	      
			$idRec=$_REQUEST['id'];
            $sql="SELECT nom FROM clients WHERE numclie='$idRec'";
			$resultat = mysqli_query($con, $sql) or die('Consulta fallida: ' . mysqli_error($con));
			$registre = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
			$nom = utf8_encode($registre['nom']);
			if ($nom != '')
			{
				//$bufferHTML ="<html><head><style>table,td,tr,th{border-collapse: collapse; border: 1px solid black; padding:5px;}</style></head></html>";
				$bufferHTML = $bufferHTML."<h1> LListat de comandes de ".$nom."</h1><br><br>";
			}

			$sql="SELECT * FROM comanda WHERE clie='$idRec'";
			$resultat = mysqli_query($con, $sql) or die('Consulta fallida: ' . mysqli_error($con));
			
			while ($registre = mysqli_fetch_array($resultat, MYSQLI_ASSOC))
			{	
				$bufferHTML = $bufferHTML."<table style='width:70%';'border-collapse:collapse';'border: 1px solid black';'padding:5px'>";
				$bufferHTML = $bufferHTML."<tr><th>Cliente</th><th>Fecha</th><th>Importe</th><th>Pedido</th><th>Vendedor</th></tr>";
                while ($registre = mysqli_fetch_array($resultat, MYSQLI_ASSOC)) 
                {
                    $bufferHTML = $bufferHTML."<tr>";
                    // només si volem mostrar tots els camps de la consulta
                    foreach ($registre as $col_value) 
                    {
						$bufferHTML = $bufferHTML.(utf8_encode("<td>$col_value</td>"));
					}
					$bufferHTML = $bufferHTML."</tr>";
                }
                $bufferHTML = $bufferHTML."</table>";		
			}
		}
		mysqli_close($con);
		
		/*---------------------------------------------------------------------------------*/
	
		// include autoloader
		require_once 'dompdf/autoload.inc.php';
	
		// reference the Dompdf namespace
		use Dompdf\Dompdf;
		//
	
	
		// instantiate and use the dompdf class
		$dompdf = new Dompdf();
		$dompdf->load_html(utf8_encode($bufferHTML));
	
		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4','landscape');
	
		// Render the HTML as PDF
		$dompdf->render();
	
		// esto te deja en la variable $pdf el contenido del documento PDF
		//output() lo deja en directorio descarga
		$pdf = $dompdf->output(); 
		$ruta_pdf = "../doc/";
		$filename = "Llistat_comandes_client.pdf";
		file_put_contents($ruta_pdf.$filename,$pdf);
	
		// Enviamos el fichero PDF al navegador.
		//$dompdf->stream('doc/taules.pdf');
		
		echo "<h2>Impressió correcta!</h2><br><br>";
		echo "<a href='../doc/LListat_comandes_client.pdf'>Veure Llistat de comandes de ".$nom."</a><br><br>";
		echo "<a href='enviar-correu-client.php?nom=$nom&url=../doc/Llistat_clients.pdf&fitxer=Llistat_clients.pdf'>Enviar Llistat de comandes de ".$nom."</a>";
?>
