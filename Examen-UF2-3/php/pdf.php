<?php
    require ('funciones.php');

    // include autoloader
    require_once '../dompdf/autoload.inc.php';
    
    // reference the Dompdf namespace
    use Dompdf\Dompdf;
    
    $html = listadoPDF($_REQUEST['valor']); //ob_get_clean(); //muestra por pantalla

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    $dompdf->load_html($html);

    // (Optional) Setup the paper size and orientation
    //$dompdf->setPaper('A4','landscape'); //horizontal
    $dompdf->setPaper('A4', 'portrait'); //vertical

    // Render the HTML as PDF
    $dompdf->render();

    $pdf = $dompdf->output(); 
    // esto te deja en la variable $pdf el contenido del documento PDF
    $pdf = $dompdf->output(); 
    $filename = "../doc/Listado_noticias.pdf";
    file_put_contents($filename, $pdf);

    // Enviamos el fichero PDF al navegador.
    
    echo "<html>";
        echo "<h1 style='font-size:55px;font-family:century;text-align:center;padding-top:100px'>LOOK</h1>";
        echo "<h2 style='color:blue;text-align:center;padding:50px 0'>Impresión correcta!</h2>";
        echo "<a href='../doc/Listado_noticias.pdf'><p style='text-align:center'>Ver listado noticias</p></a>";
        echo "<a href='look-consulta.php'><p style='text-align:center'>Volver a la consulta</p></a>";
    echo "</html>";   
    
?>