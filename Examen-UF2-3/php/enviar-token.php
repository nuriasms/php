<?php
	require ('funciones.php');

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require '../correo/PHPMailer/src/Exception.php';
	require '../correo/PHPMailer/src/PHPMailer.php';
	require '../correo/PHPMailer/src/SMTP.php';


	//agafar email de l'usuari
	if(isset($_REQUEST["nom"])) 
    {
		// connectem amb la db
		$con = conectaBBDD();

		//obtindre correu
		//$nom=mb_strtolower($_REQUEST["nom"], 'UTF-8');
		$nom=strtolower($_REQUEST["nom"]);
        $sql = "SELECT * FROM usuari WHERE nom='$nom'";
		$consulta = mysqli_query($con, $sql)  or die('Consulta fallida: ' . mysqli_error($con));
		$registre = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
		$correu = $registre['correu'];;

		//generar password
		$token = randomPassword("20");
        //guardar nova password
        $sql = " INSERT INTO tokens (token,nom) VALUES ('$token','$nom') ";
		$consulta = mysqli_query($con, $sql)  or die('Consulta fallida: ' . mysqli_error($con));
		mysqli_close($con);
	
		// Instantiation and passing `true` enables exceptions
		$mail = new PHPMailer(true);
		try 
		{
            $resetPassLink = 'http://localhost/php/Examen-UF2-3/php/formulario-token.php?codigo='.$token;
			//Server settings
			$mail->CharSet = 'UTF-8';
			$mail->SMTPDebug = 0;                     // Enable verbose debug output
			$mail->isSMTP();                          // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPAuth   = true;                 // Enable SMTP authentication
			$mail->Username   = 'np.ifcd0210@gmail.com';   // SMTP username
			$mail->Password   = 'curs1819';             // SMTP password
			$mail->SMTPSecure = 'tls';                // Enable TLS encryption, `ssl` also accepted
			$mail->Port       = 587;                  // TCP port to connect to
			//Recipients
			$mail->setFrom('np.ifcd0210@gmail.com', 'LOOK');
			$mail->addAddress($correu, $nom);     // Add a recipient
			// Content
			$mail->isHTML(true);                                     // Set email format to HTML
            $mail->Subject = 'LOOK, canvi contrasenya per Link';
            $mail->Body    = 'Apreciad@ '.$_REQUEST['nom'].',
                    <br><br>Recentment es va enviar una sol·licitud per restablir una contrasenya del vostre compte. Si s’ha produït un error, simplement ignoreu aquest correu electrònic i no passarà res.
                    <br>Per restablir la contrasenya, visiteu l’enllaç següent: <a href="'.$resetPassLink.'">LINK recuperació</a>
                    <br><br>Salutacions,
                    <br><br>LOOK';
			$mail->send();
			echo "<html>";
            	echo "<h1 style='font-size:55px;font-family:century;text-align:center;padding-top:100px'>LOOK</h1>";
            	echo "<h2 style='color:blue;text-align:center;padding:50px 0'>Correu enviat! Tens dues hores per activar la compta</h2>";
            	echo "<a href='../index.php'><p style='text-align:center'>Volver al inicio</p></a>";
        	echo "</html>";   

            //echo '<br><br><h2>Correu enviat! Tens dues hores per activar la compte</h2>';
        } 
    
        catch (Exception $e) 
        {
			echo "<html>";
            	echo "<h1 style='font-size:55px;font-family:century;text-align:center;padding-top:100px'>LOOK</h1>";
            	echo "<h2 style='color:blue;text-align:center;padding:50px 0'>No s’ha pogut enviar el missatge. Error de Mailer: {$mail->ErrorInfo}</h2>";
            	echo "<a href='../index.php'><p style='text-align:center'>Volver al inicio</p></a>";
        	echo "</html>";   

            //echo "No s’ha pogut enviar el missatge. Error de Mailer: {$mail->ErrorInfo}";
        }    
	}
?>
