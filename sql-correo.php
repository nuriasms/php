<?php
    use  PHPMailer \ PHPMailer \ PHPMailer ; 
    use  PHPMailer \ PHPMailer \ Exception ;
    

    require 'correo/PHPMailer/src/Exception.php';
    require 'correo/PHPMailer/src/PHPMailer.php';
    require 'correo/PHPMailer/src/SMTP.php';

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
        $mail->isHTML(true);                                     // Set email format to HTML
        $mail->Subject = 'Pràctica canvi contrasenya';
        $mail->Body    = 'Adjuntem la nova contrasenya:<br><b>\'$_REQUEST[\'pass\']\'</b>';
        $mail->AltBody = 'Adjuntem la nova contrasenya:
        \'$_REQUEST[\'pass\']\'';
        $mail->send();
        echo '<br><br><h2>Correu enviat!</h2>';
    } 

    catch (Exception $e) 
    {
        echo "No s’ha pogut enviar el missatge. Error de Mailer: {$mail->ErrorInfo}";
    }



?>