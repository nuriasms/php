<?php
    session_start();
    require ('funciones.php');

    //Validaciones de usuario   
    $mostrarError=$_REQUEST["text"];
    if(isset($_REQUEST["text"])) 
    {
        
            echo "<html>";
            echo "<h1 style='font-size:55px;font-family:century;text-align:center;padding-top:100px'>LOOK</h1>";
            echo "<h2 style='color:red;text-align:center;padding:50px 0'>";
            echo $mostrarError;
            echo "</h2>";
            echo "<a href='../index.php'><p style='text-align:center'>Volver al inicio</p></a>";
            echo "</html>";
        }
?>

