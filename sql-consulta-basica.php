<?php
// dades de configuració
$ip = 'localhost';
$usuari = 'root';
$password = '';
$db_name = 'empresa';

// connectem amb la db
$con = mysqli_connect($ip,$usuari,$password,$db_name);
if (!$con)  
{
    echo "Ha fallat la connexió a MySQL: " . mysqli_connect_errno();
    echo "Ha fallat la connexió a MySQL: " . mysqli_connect_error();
}
else
{
    
    $sql = "SELECT * FROM empleats";
    $resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
    echo "<table>";
    while ($registre = mysqli_fetch_array($resultat, MYSQLI_ASSOC)) 
    {
        echo "<tr>";
        // només si volem mostrar tots els camps de la consulta
        foreach ($registre as $col_value) 
        {
            echo "<td>$col_value</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
mysqli_close($con);
?>