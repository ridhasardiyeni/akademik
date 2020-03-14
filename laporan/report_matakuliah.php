<?php
require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,7,'POLITEKNIK NEGERI PADANG',0,1,'C');
$pdf->Cell(190,7,'DAFTAR MATAKULIAH',0,1,'C');

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'No',1,0,'C');
$pdf->Cell(20,6,'KODE',1,0,'C');
$pdf->Cell(40,6,'NAMA MATAKULIAH',1,0,'C');
$pdf->Cell(20,6,'SKS',1,0,'C');
$pdf->Cell(20,6,'JAM',1,0,'C');
$pdf->Cell(50,6,'KETERANGAN',1,1,'C');
$pdf->SetFont('Arial','',8);
include("koneksi.php");
$matakuliah = mysql_query("select * from matakuliah");
$no=1;
while ($row = mysql_fetch_array($matakuliah))
{
	$pdf->Cell(10,6,$no,1,0,'C');
	$pdf->Cell(20,6,$row['kode_matkul'],1,0);
	$pdf->Cell(40,6,$row['nama_matkul'],1,0);
	$pdf->Cell(20,6,$row['sks'],1,0,'C');
	$pdf->Cell(20,6,$row['jam'],1,0,'C');
	$pdf->Cell(50,6,$row['keterangan'],1,1);
	$no++;
}
$pdf->Output();
?>