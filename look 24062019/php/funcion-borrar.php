<?php
    // dades de configuració
    $ip = 'localhost';
    $usuari = 'prova';
    $password = 'prova';
    $db_name = 'prova';

    // connectem amb la db
    $con = mysqli_connect($ip,$usuari,$password,$db_name);
    if (!$con)  
    {
        echo "Ha fallat la connexió a MySQL: " . mysqli_connect_errno();
        echo "Ha fallat la connexió a MySQL: " . mysqli_connect_error();
    }
    else
    {
        $sql="DELETE FROM noticies WHERE autor='".$_GET['nom']."' && idnoticia='".$_GET['id']."'";
        $consulta = mysqli_query($con, $sql) or die('Consulta fallida: ' . mysqli_error($con));	
    }
    mysqli_close($con);
    if ($_GET['cas']==1)
    {
        header("Location: look-edita.php");
    }
    else
    {
        header("Location: look-consulta.php");
    }
    
?>