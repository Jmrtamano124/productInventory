<?php
require '../boot.php';
require_once('pdf/fpdf.php');
include('pdf/qrcode.class.php');

$pdf = new FPDF('P', 'mm', 'legal');
$pdf->AddPage();
$productQrId = $_GET['id'];
$productName = $_GET['description'];

$qrcode = new QRcode(utf8_encode($productQrId), 'Q');
$qrcode->disableBorder();

$qrcode->displayFPDF($pdf, 40, 10, 50); // QR left
$pdf->Line(115,5,115,90); //center line vertical
$pdf->Line(0,90,220,90); //center line horizontal
$qrcode->displayFPDF($pdf, 138, 10, 50); //QR right

$pdf->SetXY(20,62);
$pdf->SetFont('Times','B', 11);
$pdf->Cell(90,7,utf8_decode($productQrId),0,0,'C'); //plate number left

$pdf->SetXY(20,70);
$pdf->SetFont('Times','B', 15);
$pdf->Cell(90,7,utf8_decode(strtoupper($productName)),0,0,'C'); //plate number right


$pdf->SetXY(119,62);
$pdf->SetFont('Times','B', 11);
$pdf->Cell(90,7,utf8_decode($productQrId),0,0,'C'); //plate number right

$pdf->SetXY(119,70);
$pdf->SetFont('Times','B', 15);
$pdf->Cell(90,7,utf8_decode(strtoupper($productName)),0,0,'C'); //plate number right

$pdf->Output();
?>