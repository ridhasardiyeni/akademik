<?php
require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,7,'POLITEKNIK NEGERI PADANG',0,1,'C');
$pdf->Cell(190,7,'DAFTAR MAHASISWA',0,1,'C');

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'No',1,0,'C');
$pdf->Cell(30,6,'NIM',1,0,'C');
$pdf->Cell(65,6,'NAMA MAHASISWA',1,0,'C');
$pdf->Cell(27,6,'NO HP',1,0,'C');
$pdf->Cell(50,6,'ALAMAT',1,1,'C');
$pdf->SetFont('Arial','',8);
include("koneksi.php");
$mahasiswa = mysql_query("select * from mahasiswa");
$no=1;
while ($row = mysql_fetch_array($mahasiswa))
{
	$pdf->Cell(10,6,$no,1,0,'C');
	$pdf->Cell(30,6,$row['nim'],1,0);
	$pdf->Cell(65,6,$row['nama'],1,0);
	$pdf->Cell(27,6,$row['no_telp'],1,0,'C');
	$pdf->Cell(50,6,$row['alamat'],1,1);
	$no++;
}
$pdf->Output();
?>