<?php
    use  PHPMailer \ PHPMailer \ PHPMailer ; 
    use  PHPMailer \ PHPMailer \ Exception ;
    

    require '../correo/PHPMailer/src/Exception.php';
    require '../correo/PHPMailer/src/PHPMailer.php';
    require '../correo/PHPMailer/src/SMTP.php';

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
        $mail->setFrom('np.ifcd0210@gmail.com', 'ifcd0210');
        $mail->addAddress($_REQUEST['correo'], $_REQUEST['nom']);     // Add a recipient
        // Content
        $mail->isHTML(true); 
        if  ($_REQUEST["nom"]=="res")
        {
            $mail->Subject = 'Llistat noticies';
            $mail->Body    = 'Apreciat/da colaborador/a,
                    <br><br>Li adjuntem el llistat de noticies.
                    <br><br>Atentamente,
                    <br><br>Núria';
            $mail->AltBody = 'Apreciat/a colaborador/a,
            Li adjuntem el llistat de noticies que disposem fins avui.
            Atentament,
            Núria';
        }   
        else
        {                                // Set email format to HTML
            $mail->Subject = 'Llistat noticies';
            $mail->Body    = 'Apreciad@ '.$_REQUEST['nom'].',
                    <br><br>Li adjuntem el llistat de noticies que disposem fins avui.
                    <br><br>Atentamente,
                    <br><br>Núria';
            $mail->AltBody = 'Apreciad@ '.$_REQUEST['nom'].',
            Li adjuntem el llistat de noticies que disposem fins avui.
            Atentament,
            Núria';
        }
        $url=$_REQUEST["url"];
        $fitxer=$_REQUEST["fitxer"];
        //if (!$mail->addAttachment('../doc/Llistat_clients.pdf','Llistat_clients.pdf'))
        if (!$mail->addAttachment($url,$fitxer)) 
        {
            // código si el archivo no se pudo abrir o leer
            echo '<br><br><h2>No se ha podido leer o abrir fichero adjunto.</h2>';
        }
        $mail->send();
        echo "<html>";
            echo "<h1 style='font-size:55px;font-family:century;text-align:center;padding-top:100px'>LOOK</h1>";
            echo "<h2 style='color:blue;text-align:center;padding:50px 0'>Correo enviado!</h2>";
            echo "<a href='look-consulta.php'><p style='text-align:center'>Volver a la consulta</p></a>";
        echo "</html>";   
        //echo '<br><br><h2>Correu enviat!</h2>';
    } 

    catch (Exception $e)  
    {
        echo "<html>";
            echo "<h1 style='font-size:55px;font-family:century;text-align:center;padding-top:100px'>LOOK</h1>";
            echo "<h2 style='color:blue;text-align:center;padding:50px 0'>No s’ha pogut enviar el missatge. Error de Mailer: {$mail->ErrorInfo}</h2>";
            echo "<a href='look-consulta.php'><p style='text-align:center'>Volver a la consulta</p></a>";
        echo "</html>";   
        //echo "No s’ha pogut enviar el missatge. Error de Mailer: {$mail->ErrorInfo}";
    }



?>