<?php

namespace App\Controllers\Reporteria;

use App\DAO\FacturaDao;
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

class ReportPrinterController
{

  public function generar(){

    try {

      if ( isset( $_GET['param'] ) ) {
        $facturaId = $_GET['param'];
        $facturaDao = new FacturaDao();
        $datosFactura = $facturaDao->reporte_factura( $facturaId );
      }


      // Convierte en un Buffer el contenido del siguinete include
      ob_start();

      // Extrae los datos para usarlos en la vista
      extract(['datosFactura' => $datosFactura]);

      // ruta absoluta donde se encuentra la pagina HTML que queremos convertir a PDF
      include dirname(__FILE__).'/../../../resources/views/reports/factura.php';

      // obtenemos el buffer generado y se lo incluimos a una variable, que sera incluida en el PDF
      $content = ob_get_clean();

      // instacia de la libreia Html2Pdf, y le agregamos configuarciones previas
      $html2pdf = new Html2Pdf('P', 'A4', 'es');

      $html2pdf->setDefaultFont('Arial');

      $html2pdf->writeHTML($content);

      $html2pdf->output("factura_$facturaId.pdf");

    } catch (Html2PdfException $e) {
      $html2pdf->clean();

      $formatter = new ExceptionFormatter($e);
      echo $formatter->getHtmlMessage();
    }

  }

}