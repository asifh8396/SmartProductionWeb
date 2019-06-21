<?php
require './fpdf.php';
//if (isset($_REQUEST['btn'])) {
//  $abc = $_REQUEST['abc'];
$pdf = new FPDF();
//var_dump(get_class_methods($pdf));
$pdf->AddPage();
$header=$pdf->Image("Sapcon LH - Header.jpg", 05, 05,200, 20,'jpg');
$pdf->Header($header);
//$pdf->SetFont("Arial", "B", "10");
//$pdf->Cell(45, 10, "Created By Manoj Mukati", 1, 10, "R");
//$pdf->Cell(45, 30, "Created Pdf", 1, 10, "R");
$footer=$pdf->Image("Sapcon LH - Footer.jpg", 05, 275,200, 20,'jpg');
$pdf->Footer($footer);
$pdf->Output();
//}
?>
