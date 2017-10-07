<?
session_start();
// comment may break code
$borders = 1; // 1 is bordersAreOn; 0 is bordersOFF
$testVar = 'hi world';
require('fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(30,10,$testVar); // creates a rectangle 30x10 with $testVar sent out
$pdf->Cell(50,10,'Hello World !',$borders);
$pdf->Cell(60,10,'Powered by turnPro',$borders,1,'C');
$pdf->Cell(60,10,'Powered by FPDF.',$borders,1,'C');
$pdf->Output();
?>
