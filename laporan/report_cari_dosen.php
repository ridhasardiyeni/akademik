<?php
require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,7,'POLITEKNIK NEGERI PADANG',0,1,'C');
$pdf->Cell(190,7,'DAFTAR DOSEN',0,1,'C');

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'No',1,0,'C');
$pdf->Cell(15,6,'NIP',1,0,'C');
$pdf->Cell(40,6,'NAMA DOSEN',1,0,'C');
$pdf->Cell(30,6,'EMAIL',1,0,'C');
$pdf->Cell(30,6,'JENIS KELAMIN',1,0,'C');
$pdf->Cell(27,6,'NO TELP',1,0,'C');
$pdf->Cell(40,6,'ALAMAT',1,1,'C');
$pdf->SetFont('Arial','',8);
include("koneksi.php");
$dosen = mysql_query("select * from dosen where nip=$_GET[txtnip]");
$no=1;
while ($row = mysql_fetch_array($dosen))
{
	$pdf->Cell(10,6,$no,1,0,'C');
	$pdf->Cell(15,6,$row['nip'],1,0);
	$pdf->Cell(40,6,$row['nama'],1,0);
	$pdf->Cell(30,6,$row['email'],1,0);
	$pdf->Cell(30,6,$row['jk'],1,0,'C');
	$pdf->Cell(27,6,$row['notelp'],1,0,'C');
	$pdf->Cell(40,6,$row['alamat'],1,1);
	$no++;
}
$pdf->Output();
?>