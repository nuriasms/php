<?php
    require ('../php/funciones.php');

    $con = conectaBBDD();
    $sql="DELETE FROM noticies WHERE autor='".$_GET['nom']."' && idnoticia='".$_GET['id']."'";
    $consulta = mysqli_query($con, $sql) or die('Consulta fallida: ' . mysqli_error($con));	
   
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