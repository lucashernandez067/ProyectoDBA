<?php
// include autoloader
require_once 'resources/assets/dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

class GenerarPdf {
    public static function process($data, $name, $return) {
        // echo $data;
        try {
            // instantiate and use the dompdf class
            $dompdf = new Dompdf();
            $dompdf->loadHtml($data);

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('letter', 'portrait');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            $dompdf->stream($name);
        } catch (Exception $e) {
            echo $e;
        }
    }
}

