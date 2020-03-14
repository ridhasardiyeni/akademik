<?php
require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,7,'POLITEKNIK NEGERI PADANG',0,1,'C');
$pdf->Cell(190,7,'DAFTAR PRODI',0,1,'C');

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'No',1,0,'C');
$pdf->Cell(50,6,'NAMA PRODI',1,0,'C');
$pdf->Cell(65,6,'KETERANGAN',1,0,'C');
$pdf->Cell(50,6,'JURUSAN',1,1,'C');
$pdf->SetFont('Arial','',8);
include("koneksi.php");
$prodi = mysql_query("select * from prodi");
$no=1;
while ($row = mysql_fetch_array($prodi))
{
	include("koneksi.php");
	$queryjur=mysql_query("SELECT * FROM jurusan WHERE id_jurusan=$row[id_jurusan]");
	$datajur=mysql_fetch_array($queryjur);
	$pdf->Cell(10,6,$no,1,0,'C');
	$pdf->Cell(50,6,$row['nama_prodi'],1,0);
	$pdf->Cell(65,6,$row['keterangan'],1,0,'C');
	$pdf->Cell(50,6,$datajur['nama_jurusan'],1,1,'C');
	$no++;
}
$pdf->Output();
?>