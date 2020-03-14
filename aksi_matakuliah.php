<?php
if ($_GET['proses'] == 'tambah') {
if(isset($_POST['simpan']))
{
	include ("koneksi.php");
	$kode = $_POST['txtkode'];
	$nama = $_POST['txtnama'];
	$sks = $_POST['txtsks'];
	$jam = $_POST['txtjam'];
	$keterangan= $_POST['txtketerangan'];
	
	$query=mysql_query("insert into matakuliah (kode_makul,nama_makul,sks,jam,keterangan) 
	values ('$kode','$nama','$sks','$jam','$keterangan')");
	
	if($query)
			echo "<script>alert('data anda telah masuk !!!')</script>";
		else
			echo "<script>alert('masukkan data anda secara lengkap !!!')</script>";
	header('location:index.php?page=matakuliah');
}
}
else if ($_GET['proses'] == 'update'){
	if(isset($_POST['update']))
{
	include('koneksi.php');
	$ubah=mysql_query("UPDATE matakuliah SET 
						kode_makul  ='$_POST[txtkode]',
						nama_makul = '$_POST[txtnama]',
						sks = '$_POST[txtsks]',
						jam = '$_POST[txtjam]',
						keterangan = '$_POST[txtketerangan]'
					WHERE kode_makul  ='$_POST[kode]'");
	if($ubah)
		header('location:index.php?page=matakuliah');
}
}
else if ($_GET['proses'] == 'delete'){
	include('koneksi.php');
	$kode = $_GET['kode'];
	$query=mysql_query("DELETE FROM matakuliah WHERE kode_makul='$kode'");
	header('location:index.php?page=matakuliah');
}
?>