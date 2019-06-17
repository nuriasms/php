<?php
		$bufferHTML= '';
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
			$nom = mysqli_query($con, $sql) or die('Consulta fallida: ' . mysqli_error($con));
			
			$sql="SELECT * FROM comanda WHERE clie='$idRec'";
			$resultat = mysqli_query($con, $sql) or die('Consulta fallida: ' . mysqli_error($con));
			
			$bufferHTML = $nom;
			//$bufferHTML = "<h1>Llistat comandes de ".$nom."</h1><br><br>";
			while ($registre = mysqli_fetch_array($resultat, MYSQLI_ASSOC))
			{	
				$bufferHTML = $bufferHTML."<table>";
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
		$html = ob_get_clean();
	
	
		// instantiate and use the dompdf class
		$dompdf = new Dompdf();
		$dompdf->load_html($bufferHTML);
	
		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4','landscape');
	
		// Render the HTML as PDF
		$dompdf->render();
	
		$pdf = $dompdf->output(); 
		// esto te deja en la variable $pdf el contenido del documento PDF
		$pdf = $dompdf->output(); 
		$filename = "../doc/Llistat_comandes_client".'.pdf';
		file_put_contents($filename, $pdf);
	
		// Enviamos el fichero PDF al navegador.
		//$dompdf->stream('doc/taules.pdf');
	
		echo "<h2>Impressió correcta!</h2><br><br>";
		echo "<a href='../doc/LListat_comandes_client.pdf'>Veure Llistat de comandes</a>";
		

?>
