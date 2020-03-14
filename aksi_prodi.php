<?php
include('koneksi.php');
	if($_GET['proses']=='tambah')
	{
		if(isset($_POST['simpan']))
		{
			include ("koneksi.php");
			$nama_prodi = $_POST['txtnama_prodi'];
			$ket = $_POST['txtket'];
			$id_jurusan = $_POST['txtid_jurusan'];
			
			$query=mysql_query("insert into prodi (nama_prodi,keterangan,id_jurusan) 
			values ('$nama_prodi','$ket','$id_jurusan')");
			
			if($query)
					echo "<script>alert('data anda telah masuk !!!')</script>";
				else
					echo "<script>alert('masukkan data anda secara lengkap !!!')</script>";
			header('location:index.php?page=prodi');
		}
	}
	else if($_GET['proses']=='delete')
	{
		$id = $_GET['id'];
		$query=mysql_query("DELETE FROM prodi WHERE id_prodi='$id'");
		header('location:index.php?page=prodi');
	}
	else if($_GET['proses']=='update')
	{
		if(isset($_POST['update']))
		{
			$ubah=mysql_query("UPDATE prodi SET 
								nama_prodi  ='$_POST[txtnama_prodi]',
								keterangan = '$_POST[txtket]',
								id_jurusan = '$_POST[txtid_jurusan]'
							WHERE id_prodi  ='$_POST[id]'");
			if($ubah)
				header("location:index.php?page=prodi");
		}
	}
?>