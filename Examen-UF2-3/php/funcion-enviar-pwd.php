<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require '../correo/PHPMailer/src/Exception.php';
	require '../correo/PHPMailer/src/PHPMailer.php';
	require '../correo/PHPMailer/src/SMTP.php';

	function randomPassword() 
	{
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 4; $i++) 
		{
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}

	//agafar email de l'usuari
	if(isset($_REQUEST["nom"])) 
    {
		// dades de configuració
		$ip = 'localhost';
		$usuari = 'prova';
		$pass = 'prova';
		$db_name = 'prova';

		// connectem amb la db
		$con = mysqli_connect($ip,$usuari,$pass,$db_name);
		if (!$con)  
		{
			echo "Ha fallat la connexió a MySQL: " . mysqli_connect_errno();
			echo "Ha fallat la connexió a MySQL: " . mysqli_connect_error();
		}

		//obtindre correu
		$nom=strtolower($_REQUEST["nom"]);
		$sql = "SELECT * FROM usuari WHERE nom='$nom'";
		$consulta = mysqli_query($con, $sql)  or die('Consulta fallida: ' . mysqli_error($con));
		$registre = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
		$correu = $registre['correu'];;

		//generar password
		$newpassword = randomPassword();
		$psw = md5(sha1($newpassword));
		//guardar nova password
		$sql = "UPDATE usuari SET contrasenya ='$psw' WHERE nom='$nom' ";
		$consulta = mysqli_query($con, $sql)  or die('Consulta fallida: ' . mysqli_error($con));
		mysqli_close($con);
	
		// Instantiation and passing `true` enables exceptions
		$mail = new PHPMailer(true);
		try 
		{
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
			$mail->Subject = 'LOOK: Canvi contrasenya';
			$mail->Body    = 'Apreciad@ '.$nom.',
					<br><br>Li adjuntem la seva nova contrasenya:
					<br><br><b>'.$newpassword.'</b>
					<br><br>Atentament,
					<br><br>LOOK';
			$mail->AltBody = 'Apreciad@ '.$nom.',
			Li adjuntem la seva nova contrasenya:
			'.$newpassword.'
			Atentament,
			LOOK';
			$mail->send();
			echo '<br><br><h2>Correu enviat!</h2>';
    	} 

		catch (Exception $e) 
		{
			echo "No s’ha pogut enviar el missatge. Error de Mailer: {$mail->ErrorInfo}";
		}
	}
?>
