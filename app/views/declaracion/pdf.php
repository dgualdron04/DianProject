<?php
require('./fpdf182/fpdf.php');

class PDF extends FPDF
{
   //Cabecera de página
   function TablaBasica($header)
   {
      $fecha = getdate();
      $subtotal = $header[2]['rentaliquida'] - $header[5]['deducciones'] - $header[6]['rentaexentatotal'];
      $retatrabajoexenta = $subtotal * 25 / 100;

      $this->Cell(40, 5, "Nombre Completo: " . $header[7], 0, 0, 'C');

      $this->Ln();

      $this->Cell(40, 5, "Anno Periodo", 1, 0, 'C');
      $this->Cell(7, 5, "1", 1, 0, 'C');
      $this->Cell(40, 5, $fecha['year'] - 1, 1);


      $this->Ln();

      $this->Cell(87, 5, "Patrimonio", 1, 0, 'C');
      $this->Cell(40, 5, "Renta presuntiva", 1, 0, 'C');
      $this->Cell(7, 5, "68", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->Cell(40, 5, "Patrimonio Bruto Total", 1, 0, 'C');
      $this->Cell(7, 5, "28", 1, 0, 'C');
      $this->Cell(40, 5, $header[0]['patbrutototal'], 1);
      $this->Cell(87, 5, "Cedula de pensiones", 1, 0, 'C');


      $this->Ln();

      $this->Cell(40, 5, "Deuda Total", 1, 0, 'C');
      $this->Cell(7, 5, "29", 1, 0, 'C');
      $this->Cell(40, 5, $header[0]['deudatotal'], 1);
      $this->Cell(40, 5, "Ingresos brutos", 1, 0, 'C');
      $this->Cell(7, 5, "69", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->SetFont('Times', 'B', 8);
      $this->Cell(40, 5, "Total patrimonio liquido", 1, 0, 'C');
      $this->Cell(7, 5, "30", 1, 0, 'C');
      $this->SetFont('Times', '', 8);
      $this->Cell(40, 5, $header[0]['patbrutototal'] - $header[0]['deudatotal'], 1);
      $this->Cell(40, 5, "Ingresos no constituvos de renta", 1, 0, 'C');
      $this->Cell(7, 5, "70", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->Cell(87, 5, "Cedula General", 1, 0, 'C');
      $this->SetFont('Times', 'B', 8);
      $this->Cell(40, 5, "Renta liquida", 1, 0, 'C');
      $this->Cell(7, 5, "71", 1, 0, 'C');
      $this->SetFont('Times', '', 8);
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->Cell(87, 5, "Renta de trabajo", 1, 0, 'C');
      $this->Cell(40, 5, "Rentas exentas de pensiones", 1, 0, 'C');
      $this->Cell(7, 5, "72", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->Cell(40, 5, "Ingresos brutos", 1, 0, 'C');
      $this->Cell(7, 5, "31", 1, 0, 'C');
      $this->Cell(40, 5, $header[3]['ingresobrutototal'], 1);
      $this->SetFont('Times', 'B', 8);
      $this->Cell(40, 5, "Renta liquida gravable", 1, 0, 'C');
      $this->Cell(7, 5, "73", 1, 0, 'C');
      $this->SetFont('Times', '', 8);
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->Cell(40, 5, "Ingresos no constitutivos", 1, 0, 'C');
      $this->Cell(7, 5, "32", 1, 0, 'C');
      $this->Cell(40, 5, $header[4]['ingresosnoconsetotal'], 1);
      $this->Cell(87, 5, "Cedula de dividendos y participaciones", 1, 0, 'C');


      $this->Ln();

      $this->Cell(40, 5, "Costos y deducciones", 1, 0, 'C');
      $this->Cell(7, 5, "33", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);
      $this->Cell(40, 5, "Dividendos y participaciones 2016", 1, 0, 'C');
      $this->Cell(7, 5, "74", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->SetFont('Times', 'B', 8);
      $this->Cell(40, 5, "Renta Liquida", 1, 0, 'C');
      $this->Cell(7, 5, "34", 1, 0, 'C');
      $this->SetFont('Times', '', 8);
      $this->Cell(40, 5, $header[2]['rentaliquida'], 1);
      $this->Cell(40, 5, "Ingresos no constitutivos", 1, 0, 'C');
      $this->Cell(7, 5, "75", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->Cell(40, 5, "Rentas exentas", 1, 0, 'C');
      $this->Cell(7, 5, "35", 1, 0, 'C');
      $this->Cell(40, 5, $header[5]['deducciones'] + $header[6]['rentaexentatotal'] + $retatrabajoexenta, 1);
      $this->Cell(40, 5, "Renta liquida ordinaria anno 2016", 1, 0, 'C');
      $this->Cell(7, 5, "76", 1, 0, 'C');
      $this->SetFont('Times', '', 8);
      $this->Cell(40, 5, "0", 1);


      $this->Ln();

      $this->SetFont('Times', 'B', 8);
      $this->Cell(40, 5, "Rentas exentas limitadas", 1, 0, 'C');
      $this->Cell(7, 5, "36", 1, 0, 'C');
      $this->SetFont('Times', '', 8);
      $this->Cell(40, 5, $header[2]['rentasexentasdeduccion'], 1);
      $this->Cell(40, 5, "1a. Subcedula 2017", 1, 0, 'C');
      $this->Cell(7, 5, "77", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->SetFont('Times', 'B', 8);
      $this->Cell(40, 5, "Renta Liquida de trabajo", 1, 0, 'C');
      $this->Cell(7, 5, "37", 1, 0, 'C');
      $this->SetFont('Times', '', 8);
      $this->Cell(40, 5, $header[2]['rentaliquida'] - $header[2]['rentasexentasdeduccion'], 1);
      $this->Cell(40, 5, "2a. Subcedula 2017", 1, 0, 'C');
      $this->Cell(7, 5, "78", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->Cell(87, 5, "Renta de capital", 1, 0, 'C');
      $this->Cell(40, 5, "Renta liquida pasiva dividendos", 1, 0, 'C');
      $this->Cell(7, 5, "79", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->Cell(40, 5, "Ingresos brutos", 1, 0, 'C');
      $this->Cell(7, 5, "38", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);
      $this->Cell(40, 5, "Rentas exentas de la casilla 79", 1, 0, 'C');
      $this->Cell(7, 5, "80", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->Cell(40, 5, "Ingresos no constitutivos", 1, 0, 'C');
      $this->Cell(7, 5, "39", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);
      $this->Cell(87, 5, "Ganancias ocasionales", 1, 0, 'C');

      $this->Ln();

      $this->Cell(40, 5, "Costos y deducciones", 1, 0, 'C');
      $this->Cell(7, 5, "40", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);
      $this->Cell(40, 5, "Ingresos por ganancias ocasionales", 1, 0, 'C');
      $this->Cell(7, 5, "81", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->SetFont('Times', 'B', 8);
      $this->Cell(40, 5, "Renta Liquida", 1, 0, 'C');
      $this->Cell(7, 5, "41", 1, 0, 'C');
      $this->SetFont('Times', '', 8);
      $this->Cell(40, 5, "0", 1);
      $this->Cell(40, 5, "Costos por ganancias ocasionales", 1, 0, 'C');
      $this->Cell(7, 5, "82", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);


      $this->Ln();

      $this->Cell(40, 5, "Rentas liquidas pasivas ECE", 1, 0, 'C');
      $this->Cell(7, 5, "42", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);
      $this->Cell(40, 5, "Ganancias ocasionales no gravadas", 1, 0, 'C');
      $this->Cell(7, 5, "83", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->Cell(40, 5, "Rentas exentas", 1, 0, 'C');
      $this->Cell(7, 5, "43", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);
      $this->SetFont('Times', 'B', 8);
      $this->Cell(40, 5, "Ganancias ocasionales gravables", 1, 0, 'C');
      $this->Cell(7, 5, "84", 1, 0, 'C');
      $this->SetFont('Times', '', 8);
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->SetFont('Times', 'B', 8);
      $this->Cell(40, 5, "Rentas exentas limitadas", 1, 0, 'C');
      $this->Cell(7, 5, "44", 1, 0, 'C');
      $this->SetFont('Times', '', 8);
      $this->Cell(40, 5, "0", 1);
      $this->Cell(87, 5, "Liquidacion privada", 1, 0, 'C');



      $this->Ln();

      $this->SetFont('Times', 'B', 8);
      $this->Cell(40, 5, "Rentas liquida ordinaria", 1, 0, 'C');
      $this->Cell(7, 5, "45", 1, 0, 'C');
      $this->SetFont('Times', '', 8);
      $this->Cell(40, 5, "0", 1);
      $this->Cell(87, 5, "Impuesto sobre las rentas liquidas gravables", 1, 0, 'C');

      $this->Ln();

      $this->SetFont('Times', 'B', 8);
      $this->Cell(40, 5, "Perdida liquida", 1, 0, 'C');
      $this->Cell(7, 5, "46", 1, 0, 'C');
      $this->SetFont('Times', '', 8);
      $this->Cell(40, 5, "0", 1);
      $this->Cell(40, 5, "General y de pensiones", 1, 0, 'C');
      $this->Cell(7, 5, "85", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);


      $this->Ln();

      $this->Cell(40, 5, "Compensaciones", 1, 0, 'C');
      $this->Cell(7, 5, "47", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);
      $this->Cell(40, 5, "o Renta presuntiva", 1, 0, 'C');
      $this->Cell(7, 5, "86", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->SetFont('Times', 'B', 8);
      $this->Cell(40, 5, "Renta liquida de capital", 1, 0, 'C');
      $this->Cell(7, 5, "48", 1, 0, 'C');
      $this->SetFont('Times', '', 8);
      $this->Cell(40, 5, "0", 1);
      $this->Cell(40, 5, "Dividendo y participaciones 2016", 1, 0, 'C');
      $this->Cell(7, 5, "87", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->Cell(87, 5, "Renta no laborales", 1, 0, 'C');
      $this->Cell(40, 5, "Dividendos y participaciones 2017", 1, 0, 'C');
      $this->Cell(7, 5, "88", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->Cell(40, 5, "Ingresos brutos rentas", 1, 0, 'C');
      $this->Cell(7, 5, "49", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);
      $this->Cell(40, 5, "Dividendos 2017 y siguientes", 1, 0, 'C');
      $this->Cell(7, 5, "89", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->Cell(40, 5, "Devoluciones", 1, 0, 'C');
      $this->Cell(7, 5, "50", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);
      $this->SetFont('Times', 'B', 8);
      $this->Cell(40, 5, "Total impuesto rentas liquidas", 1, 0, 'C');
      $this->Cell(7, 5, "90", 1, 0, 'C');
      $this->SetFont('Times', '', 8);
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->Cell(40, 5, "Ingresos no constitutivos", 1, 0, 'C');
      $this->Cell(7, 5, "51", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);
      $this->Cell(87, 5, "Descuentos", 1, 0, 'C');

      $this->Ln();

      $this->Cell(40, 5, "Costos y gastos procedente", 1, 0, 'C');
      $this->Cell(7, 5, "52", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);
      $this->Cell(40, 5, "Impuestos pagados exterior", 1, 0, 'C');
      $this->Cell(7, 5, "91", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->SetFont('Times', 'B', 8);
      $this->Cell(40, 5, "Renta liquida ", 1, 0, 'C');
      $this->Cell(7, 5, "53", 1, 0, 'C');
      $this->SetFont('Times', '', 8);
      $this->Cell(40, 5, "0", 1);
      $this->Cell(40, 5, "Donaciones", 1, 0, 'C');
      $this->Cell(7, 5, "92", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->Cell(40, 5, "Renta liquida pasivas", 1, 0, 'C');
      $this->Cell(7, 5, "54", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);
      $this->Cell(40, 5, "Otros", 1, 0, 'C');
      $this->Cell(7, 5, "93", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->Cell(40, 5, "Renta exentas y deduccione", 1, 0, 'C');
      $this->Cell(7, 5, "55", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);
      $this->SetFont('Times', 'B', 8);
      $this->Cell(40, 5, "Total descuentos tributarios", 1, 0, 'C');
      $this->Cell(7, 5, "94", 1, 0, 'C');
      $this->SetFont('Times', '', 8);
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->SetFont('Times', 'B', 8);
      $this->Cell(40, 5, "Renta exenta limitada ", 1, 0, 'C');
      $this->Cell(7, 5, "56", 1, 0, 'C');
      $this->SetFont('Times', '', 8);
      $this->Cell(40, 5, "0", 1);
      $this->SetFont('Times', 'B', 8);
      $this->Cell(40, 5, "Impuesto neto de renta", 1, 0, 'C');
      $this->Cell(7, 5, "95", 1, 0, 'C');
      $this->SetFont('Times', '', 8);
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->SetFont('Times', 'B', 8);
      $this->Cell(40, 5, "Renta liquida ordinaria ", 1, 0, 'C');
      $this->Cell(7, 5, "57", 1, 0, 'C');
      $this->SetFont('Times', '', 8);
      $this->Cell(40, 5, "0", 1);
      $this->Cell(40, 5, "Impuesto de ganancias ocasionales", 1, 0, 'C');
      $this->Cell(7, 5, "96", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->SetFont('Times', 'B', 8);
      $this->Cell(40, 5, "Perdida liquida del ejercicio ", 1, 0, 'C');
      $this->Cell(7, 5, "58", 1, 0, 'C');
      $this->SetFont('Times', '', 8);
      $this->Cell(40, 5, "0", 1);
      $this->Cell(40, 5, "Descuento por impuestos exterior", 1, 0, 'C');
      $this->Cell(7, 5, "97", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->Cell(40, 5, "Compensaciones por perdidas", 1, 0, 'C');
      $this->Cell(7, 5, "59", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);
      $this->SetFont('Times', 'B', 8);
      $this->Cell(40, 5, "Total impuesto a cargo ", 1, 0, 'C');
      $this->Cell(7, 5, "97", 1, 0, 'C');
      $this->SetFont('Times', '', 8);
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->SetFont('Times', 'B', 8);
      $this->Cell(40, 5, "Renta liquida no laboral", 1, 0, 'C');
      $this->Cell(7, 5, "60", 1, 0, 'C');
      $this->SetFont('Times', '', 8);
      $this->Cell(40, 5, "0", 1);
      $this->Cell(40, 5, "Anticipo renta liquidado anterior", 1, 0, 'C');
      $this->Cell(7, 5, "99", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->SetFont('Times', 'B', 8);
      $this->Cell(40, 5, "Renta liquida Cedula General", 1, 0, 'C');
      $this->Cell(7, 5, "61", 1, 0, 'C');
      $this->SetFont('Times', '', 8);
      $this->Cell(40, 5, "0", 1);
      $this->Cell(40, 5, "Saldo a favor del anno anterior", 1, 0, 'C');
      $this->Cell(7, 5, "100", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->SetFont('Times', 'B', 8);
      $this->Cell(40, 5, "Renta exentas y deducciones", 1, 0, 'C');
      $this->Cell(7, 5, "62", 1, 0, 'C');
      $this->SetFont('Times', '', 8);
      $this->Cell(40, 5, "0", 1);
      $this->Cell(40, 5, "Rentciones anno gravable declarar", 1, 0, 'C');
      $this->Cell(7, 5, "101", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->SetFont('Times', 'B', 8);
      $this->Cell(40, 5, "Renta liquida ordinaria cedula ", 1, 0, 'C');
      $this->Cell(7, 5, "63", 1, 0, 'C');
      $this->SetFont('Times', '', 8);
      $this->Cell(40, 5, "0", 1);
      $this->Cell(40, 5, "Anticipo renta para anno siguiente", 1, 0, 'C');
      $this->Cell(7, 5, "102", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->Cell(40, 5, "Compensaciones perdidas 2016", 1, 0, 'C');
      $this->Cell(7, 5, "64", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);
      $this->SetFont('Times', 'B', 8);
      $this->Cell(40, 5, "Saldo a pagar por impuesto", 1, 0, 'C');
      $this->Cell(7, 5, "103", 1, 0, 'C');
      $this->SetFont('Times', '', 8);
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->Cell(40, 5, "Compensaciones por exceso", 1, 0, 'C');
      $this->Cell(7, 5, "65", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);
      $this->Cell(40, 5, "Sanciones", 1, 0, 'C');
      $this->Cell(7, 5, "104", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->Cell(40, 5, "Rentas gravables", 1, 0, 'C');
      $this->Cell(7, 5, "66", 1, 0, 'C');
      $this->Cell(40, 5, "0", 1);
      $this->SetFont('Times', 'B', 8);
      $this->Cell(40, 5, "Total saldo a pagar", 1, 0, 'C');
      $this->Cell(7, 5, "105", 1, 0, 'C');
      $this->SetFont('Times', '', 8);
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      $this->SetFont('Times', 'B', 8);
      $this->Cell(40, 5, "Renta liquida gravable cedula", 1, 0, 'C');
      $this->Cell(7, 5, "67", 1, 0, 'C');
      $this->SetFont('Times', '', 8);
      $this->Cell(40, 5, "0", 1);
      $this->SetFont('Times', 'B', 8);
      $this->Cell(40, 5, "Total saldo a favor", 1, 0, 'C');
      $this->Cell(7, 5, "106", 1, 0, 'C');
      $this->SetFont('Times', '', 8);
      $this->Cell(40, 5, "0", 1);

      $this->Ln();

      /* print_r($header); */
      /* echo $header[0]['deudatotal']; */
   }
}

$pdf = new PDF();
$header = array('Columna 1', 'Columna 2', 'Columna 3', 'Columna 4');
$pdf->AddPage();
$pdf->SetFont('Times', '', 8);
$pdf->TablaBasica($data);
$pdf->Output();

?>