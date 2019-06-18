<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Llistat clients</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<style>
			.error {
				color: red;
			}
			table, td, tr, th{
				border-collapse: collapse;
				border: 1px solid black;
				padding:5px;
			}
			body{
				margin-left: 40px;
			}
		</style>
	</head>
	<body>
		<h1>Llistat clients</h1>
		<br>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >  
  		
				<input type="submit" name="imprimir" value="Imprimir pdf">
				<input type="submit" name="correo" value="Enviar pdf por correo">
		</form>
		<br>
		<?php
		//Inicializa variables
			if(isset($_POST["imprimir"]))
			{	
				header("Location: imprimir-pdf.php");
				exit;
			}
			if(isset($_POST["correo"]))
			{	
				header("Location: enviar-correu-client.php?nom=res&url=../doc/Llistat_clients.pdf&fitxer=Llistat_clients.pdf");
				exit;
            }
           
            // dades de configuració
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
                $sql = "SELECT * FROM clients";
                $resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
				echo "<table>";
				echo "<tr>";
				$nfilas = $resultat->num_rows;
    			$i=0;
				if ($nfilas>0)
				{
					$registre = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
					foreach ($registre as $key=>$col_value) 
					{
            			echo "<th>$key</th>";
					}
				}
				echo "<th> </th>";
				echo "</tr>";
                while ($registre = mysqli_fetch_array($resultat, MYSQLI_ASSOC)) 
                {
                    echo "<tr>";
                    // només si volem mostrar tots els camps de la consulta
                    foreach ($registre as $col_value) 
                    {
						echo utf8_encode("<td>$col_value</td>");
					}
					echo "<td><a href='seleccio-client-correu.php?id=$registre[numclie]'><button type='button' class='btn btn-default'><span class='glyphicon glyphicon-file'></span></button></a></td>";
                    echo "</tr>";
                }
                echo "</table>";			
            }
            mysqli_close($con);	 
		?>	
	</body>
</html>  