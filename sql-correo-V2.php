<?php
//https://programacion.net/articulo/sistema_de_recuperacion_de_contrasenas_con_php_y_mysql_1707
    use  PHPMailer \ PHPMailer \ PHPMailer ; 
    use  PHPMailer \ PHPMailer \ Exception ;
    

    require 'correo/PHPMailer/src/Exception.php';
    require 'correo/PHPMailer/src/PHPMailer.php';
    require 'correo/PHPMailer/src/SMTP.php';

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try 
    {
        
        $resetPassLink = 'http://localhost/php/sql-formulario-link.php?codigo='.$_REQUEST['token'];
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
        $mail->addAddress($_REQUEST["correu"], $_REQUEST["nom"]);     // Add a recipient
        // Content
        $mail->isHTML(true);                                     // Set email format to HTML
        $mail->Subject = 'Canvi contrasenya per Link';
        $mail->Body    = 'Apreciad@ '.$_REQUEST['nom'].',
                <br><br>Recentment es va enviar una sol·licitud per restablir una contrasenya del vostre compte. Si s’ha produït un error, simplement ignoreu aquest correu electrònic i no passarà res.
                <br>Per restablir la contrasenya, visiteu l’enllaç següent: <a href="'.$resetPassLink.'">'LINK recuperació'</a>
                <br><br>Salutacions,
                <br><br>Núria';
        $mail->AltBody = 'Apreciad@ '.$_REQUEST['nom'].',
        Li adjuntem la seva nova contrasenya:
        '.$_REQUEST['pass'].'
        Atentament,
        Núria';
        $mail->send();
        echo '<br><br><h2>Correu enviat! Tens dues hores per activar la conte</h2>';
    } 

    catch (Exception $e) 
    {
        echo "No s’ha pogut enviar el missatge. Error de Mailer: {$mail->ErrorInfo}";
    }



?>