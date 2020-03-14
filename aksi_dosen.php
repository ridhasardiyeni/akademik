<?php
if ($_GET['proses'] == 'tambah') {
if(isset($_POST['simpan']))
{
	include ("koneksi.php");
	$nip = $_POST['txtnip'];
	$nama = $_POST['txtnama'];
	$email = $_POST['txtemail'];
	$jk = $_POST['cmbjk'];
	$notelp= $_POST['txtnotelp'];
	$alamat= $_POST['txtalamat'];
	
	$query=mysql_query("insert into dosen (nip,nama,email,jk,notelp,alamat) 
	values ('$nip','$nama','$email','$jk','$notelp','$alamat')");
	
	if($query)
			echo "<script>alert('data anda telah masuk !!!')</script>";
		else
			echo "<script>alert('masukkan data anda secara lengkap !!!')</script>";
	header('location:index.php?page=dosen');
}
}
else if ($_GET['proses'] == 'update'){
	if(isset($_POST['update']))
{
	include('koneksi.php');
	$ubah=mysql_query("UPDATE dosen SET 
						nip  ='$_POST[txtnip]',
						nama = '$_POST[txtnama]',
						email = '$_POST[txtemail]',
						jk = '$_POST[cmbjk]',
						notelp = '$_POST[txtnotelp]',
						alamat = '$_POST[txtalamat]'
					WHERE nip  ='$_POST[nip]'");
	if($ubah)
		header('location:index.php?page=dosen');
}
}
else if ($_GET['proses'] == 'delete'){
	include('koneksi.php');
	$nip = $_GET['nip'];
	$query=mysql_query("DELETE FROM dosen WHERE nip='$nip'");
	header('location:index.php?page=dosen');
}
?>