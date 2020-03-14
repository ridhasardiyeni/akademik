<?php
if ($_GET['proses'] == 'tambah') {
if(isset($_POST['simpan']))
{
	include ("koneksi.php");
	$kode_matkul = $_POST['txtmatkul'];
	$nama_matkul = $_POST['txtnama'];
	$sks = $_POST['txtsks'];
	$jam = $_POST['txtjam'];
	$keterangan= $_POST['txtket'];
	
	$query=mysql_query("insert into matakuliah (kode_matkul,nama_matkul,sks,jam,keterangan) 
	values ('$kode_matkul','$nama_matkul','$sks','$jam','$keterangan')");
	
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
						kode_matkul  ='$_POST[txtmatkul]',
						nama_matkul = '$_POST[txtnama]',
						sks = '$_POST[txtsks]',
						jam = '$_POST[txtjam]',
						keterangan = '$_POST[txtket]'
					WHERE kode_matkul  ='$_POST[kode_matkul]'");
	if($ubah)
		header('location:index.php?page=matakuliah');
}
}
else if ($_GET['proses'] == 'delete'){
	include('koneksi.php');
	$kode_matkul = $_GET['kode_matkul'];
	$query=mysql_query("DELETE FROM matakuliah WHERE kode_matkul='$kode_matkul'");
	header('location:index.php?page=matakuliah');
}
?>