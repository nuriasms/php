<?php
    function cerrarSesion()
    {
        session_start();
        //borra variables de la sesión
        unset($_SESSION["nombre_usuario"]);  
        //cierra sesión
        session_destroy();
        header("Location: ../index.php");
        exit;
    }

    function borrarCookie()
    {
        //Destruir cookie.
        setcookie("usuario",0,1,"/",false, false);
        setcookie("contrasena",0,1,"/",false, false);
        header("Location: ../index.php");
        exit;
    }
?>