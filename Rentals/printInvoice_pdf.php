<?php
// get the HTML
    ob_start(); //
  
    include('printInvoice.php');
    $content = ob_get_clean(); //

    // convert in PDF
    require_once('Model/pdf/html2pdf.class.php'); //inclusion de la class pdf
    
    try
    {
        //$width_in_mm = 108;
    //$height_in_mm = 59.2;
    //$html2pdf = new HTML2PDF('L', array($width_in_mm, $height_in_mm), 'fr', false, 'ISO-8859-15', 0);
        $html2pdf = new HTML2PDF('L', 'A6', 'en');
//      $html2pdf->setModeDebug();
        #$html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        ob_end_clean();
        $html2pdf->Output('Invoce'.$_REQUEST['idr'].'.pdf', '../Rentals/');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
