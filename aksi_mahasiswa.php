<?php
if ($_GET['proses'] == 'tambah') {
if(isset($_POST['simpan']))
{
	include ("koneksi.php");
	$nim = $_POST['txtnim'];
	$nama = $_POST['txtnama'];
	$jekel = $_POST['cmbjekel'];
	$id_jurusan = $_POST['txtid_jurusan'];
	$id_prodi= $_POST['txtid_prodi'];
	$no_telp = $_POST['txtno_telp'];
	$alamat= $_POST['txtalamat'];
	
	$query=mysql_query("insert into mahasiswa (nim,nama,jekel,id_jurusan,id_prodi,no_telp,alamat) 
	values ('$nim','$nama','$jekel','$id_jurusan','$id_prodi','$no_telp','$alamat')");
	
	if($query)
			echo "<script>alert('data anda telah masuk !!!')</script>";
		else
			echo "<script>alert('masukkan data anda secara lengkap !!!')</script>";
	header('location:index.php?page=mahasiswa');
}
}
else if ($_GET['proses'] == 'update'){
	if(isset($_POST['update']))
{
	include('koneksi.php');
	$ubah=mysql_query("UPDATE mahasiswa SET 
						nim  ='$_POST[txtnim]',
						nama = '$_POST[txtnama]',
						jekel = '$_POST[cmbjekel]',
						id_jurusan = '$_POST[txtid_jurusan]',
						id_prodi = '$_POST[txtid_prodi]',
						no_telp = '$_POST[txtno_telp]',
						alamat = '$_POST[txtalamat]'
					WHERE nim  ='$_POST[nim]'");
	if($ubah)
		header('location:index.php?page=mahasiswa');
}
}
else if ($_GET['proses'] == 'delete'){
	include('koneksi.php');
	$nim = $_GET['nim'];
	$query=mysql_query("DELETE FROM mahasiswa WHERE nim='$nim'");
	header('location:index.php?page=mahasiswa');
}
?>