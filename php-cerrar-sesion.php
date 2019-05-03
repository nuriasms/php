
    <?php
        session_start();
        print ("<h2>Cerrando sesión</h2>");
        //Destruir cookie.
        setcookie("usuario",0,1,"/",false, false);
        setcookie("contrasena",0,1,"/",false, false);
        //borra variables de la sesión
        unset($_SESSION["nombre_usuario"]);  
        //cierra sesión
        session_destroy();
        header("Location: php-login-V2.php");
        exit;
    ?>