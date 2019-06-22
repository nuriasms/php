<?php
    session_start();
    require ('funciones.php');

    //Validaciones de usuario   
    $mostrarError="";

    if (empty($_REQUEST['nombre']) || empty($_REQUEST['contrasena']))
    {	
        $mostrarError="Nombre y contraseña obligatorios, no pueden estar vacíos."; 
    }
    else
    {
        if (!$tmp=validarUsuario($_REQUEST['nombre'],$_REQUEST['contrasena']))
        {		
            $mostrarError="ERROR al validar usuario";										
        }
        else
        {
            echo 'alert("abans")';
            guardarCookie($_REQUEST['nombre'],$_REQUEST['contrasena'],$_REQUEST['recordar']);
            //iniciarSesion($_REQUEST['nombre'],$_REQUEST['contrasena']);
        }
    }
    //if (!empty($mostrarError))
    //{
        $tmp ="";
        echo "<html>";
        echo "<h1 style='font-size:55px;font-family:century;text-align:center;padding-top:100px'>LOOK</h1>";
        echo "<h2 style='color:red;text-align:center;padding:50px 0'>";
        echo $mostrarError;
        echo "</h2>";
        echo "<a href='../index.php'><p style='text-align:center'>Volver al inicio</p></a>";
        echo "</html>";
   // }
?>

