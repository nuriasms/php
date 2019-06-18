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
        $mail->addAddress('nuria-sms@live.com', 'Núria');     // Add a recipient
        // Content
        $mail->isHTML(true); 
        if  ($_REQUEST["nom"]=="res")
        {
            $mail->Subject = 'Llistat de clients';
            $mail->Body    = 'Apreciado/a colaborador/a,
                    <br><br>Li adjuntem el llistat de clients.
                    <br><br>Atentamente,
                    <br><br>Núria';
            $mail->AltBody = 'Apreciado/a colaborador/a,
            Li adjuntem el llistat de comandas que ha realitzat fins avui.
            Atentament,
            Núria';
        }   
        else
        {                                // Set email format to HTML
            $mail->Subject = 'Llistat de comandes de '.$_REQUEST["nom"];
            $mail->Body    = 'Apreciad@ '.$_REQUEST['nom'].',
                    <br><br>Li adjuntem el llistat de comandas que ha realitzat fins avui.
                    <br><br>Atentamente,
                    <br><br>Núria';
            $mail->AltBody = 'Apreciad@ '.$_REQUEST['nom'].',
            Li adjuntem el llistat de comandas que ha realitzat fins avui.
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
        echo '<br><br><h2>Correu enviat!</h2>';
    } 

    catch (Exception $e) 
    {
        echo "No s’ha pogut enviar el missatge. Error de Mailer: {$mail->ErrorInfo}";
    }



?>