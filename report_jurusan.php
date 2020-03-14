<?php
require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,7,'POLITEKNIK NEGERI PADANG',0,1,'C');
$pdf->Cell(190,7,'DAFTAR JURUSAN',0,1,'C');

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'No',1,0,'C');
$pdf->Cell(65,6,'NAMA JURUSAN',1,0,'C');
$pdf->Cell(65,6,'KETERANGAN',1,1,'C');
$pdf->SetFont('Arial','',8);
include("koneksi.php");
$jurusan = mysql_query("select * from jurusan");
$no=1;
while ($row = mysql_fetch_array($jurusan))
{
	$pdf->Cell(10,6,$no,1,0,'C');
	$pdf->Cell(65,6,$row['nama_jurusan'],1,0);
	$pdf->Cell(65,6,$row['keterangan'],1,1);
	$no++;
}
$pdf->Output();
?>