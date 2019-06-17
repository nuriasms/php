<?php
    // include autoloader
    require_once 'dompdf/autoload.inc.php';
    require ("llistat-clients.php");

    // reference the Dompdf namespace
    use Dompdf\Dompdf;
    $html = ob_get_clean();


    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    $dompdf->load_html($html);
    //$dompdf->load_html(utf8_decode('<h1>Hola mundo!</h1>'));

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4','landscape');

    // Render the HTML as PDF
    $dompdf->render();

    $pdf = $dompdf->output(); 
    // esto te deja en la variable $pdf el contenido del documento PDF
    $pdf = $dompdf->output(); 
    $filename = "../doc/Llistat_clients".'.pdf';
    file_put_contents($filename, $pdf);

    // Enviamos el fichero PDF al navegador.
    //$dompdf->stream('doc/taules.pdf');

    echo "<h2>Impressió correcta!</h2><br><br>";
    echo "<a href='../doc/LListat_clients.pdf'>Veure Llistat clients</a>";
    
?>