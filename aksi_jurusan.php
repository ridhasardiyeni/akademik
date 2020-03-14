<?php
include ("koneksi.php");
	if($_GET['proses']=='tambah')
	{
		if(isset($_POST['simpan']))
		{
			$nama_jurusan = $_POST['txtnama_jurusan'];
			$ket = $_POST['txtket'];
			
			$query=mysql_query("insert into jurusan (nama_jurusan,keterangan) 
			values ('$nama_jurusan','$ket')");
			
			if($query)
					echo "<script>alert('data anda telah masuk !!!')</script>";
				else
					echo "<script>alert('masukkan data anda secara lengkap !!!')</script>";
			header('location:index.php?page=jurusan');
		}
	}
	else if($_GET['proses']=='update')
	{
		if(isset($_POST['update']))
		{
			$ubah=mysql_query("UPDATE jurusan SET 
								nama_jurusan  ='$_POST[txtnama_jurusan]',
								keterangan = '$_POST[txtket]'
							WHERE id_jurusan  ='$_POST[id]'");
			if($ubah)
				header("location:index.php?page=jurusan");
		}
	}
	else if ($_GET['proses'] == 'delete'){
	include('koneksi.php');
	$id = $_GET['nim'];
	$query=mysql_query("DELETE FROM jurusan WHERE nim='$id'");
	header('location:index.php?page=jurusan');
}
?>