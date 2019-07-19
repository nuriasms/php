<?php  
    $con = conectaBBDD();

    //se requiere el archivo para validar los datos de usuario de bdd para conectar   
    //$ip = $_SERVER['REMOTE_ADDR'];  
    $ip = getRealIP(); 
    $fecha = date("d-m-Y");   
    $hora = date("G:i:s");   
    $horau = date("H");   
    $diau = date("z");   
    $aniou = date("Y");
    $dia = date("w");   
    //se asignan la variables   
    $sql = "SELECT aniou, diau, horau, ip FROM contador WHERE aniou LIKE '$aniou' AND diau LIKE '$diau' AND horau LIKE '$horau' AND ip LIKE '$ip' ";   
    $es = mysqli_query($con, $sql) or die('Consulta fallida: ' . mysqli_error($con));
    //se buscan los registros que coincidan con la hora,dia,año e ip    
    if(mysqli_num_rows($es)>0)   
    {
        //no se cuenta la visita   
    }   
    else   
    {   
        $sql = "INSERT INTO contador (id, ip, fecha, hora, horau, diau, aniou, dia) VALUES ('','$ip','$fecha','$hora','$horau','$diau','$aniou','$dia')";   
        $es = mysqli_query($con, $sql) or die('Consulta fallida: ' . mysqli_error($con));
    }   
    //creamos el condicionamiendo para logearlo o no.   
   /* $sql = "SELECT * ";   
    $sql.= "FROM contador WHERE id ";   
    $es = mysqli_query($con, $sql) or die('Consulta fallida: ' . mysqli_error($con));
    $visitas = mysqli_num_rows($es);    */ 
?>   