<?php
    session_start();
    require ('funciones.php');

    echo "<html>";
    echo "<h1 style='font-size:55px;font-family:century;text-align:center;padding-top:100px'>LOOK</h1>";
    echo "<h2 style='color:blue;text-align:center;padding:50px 0'>Impresión correcta!</h2>";
    echo "<a href='../doc/Listado_noticias.pdf'><p style='text-align:center'>Ver listado noticias</p></a>";
    echo "<a href='look-consulta.php'><p style='text-align:center'>Volver a la consulta</p></a>";
    echo "</html>";
    
?>