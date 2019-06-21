<?php
require './fpdf.php';
//if (isset($_REQUEST['btn'])) {
//  $abc = $_REQUEST['abc'];
$pdf = new FPDF();
var_dump(get_class_methods($pdf));
$pdf->AddPage();
$pdf->Image($file, $x, $y, $w, $h, $type);
$pdf->Header();
$pdf->SetFont("Arial", "B", "10");
$pdf->Cell(45, 10, "Created By Manoj Mukati", 1, 10, "R");
$pdf->Cell(45, 30, "Created Pdf", 1, 10, "R");
$pdf->Output();
//}
?>
