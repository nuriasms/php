<?php
    require ('funciones.php');

    // include autoloader
    require_once '../dompdf/autoload.inc.php';
    
    // reference the Dompdf namespace
    use Dompdf\Dompdf;
    $html = listadoPDF(); //ob_get_clean(); //muestra por pantalla


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
    
    header("Location: respuesta-pdf.php");
    
    
?>