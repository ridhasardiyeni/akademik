<?php
if ($_GET['proses'] == 'tambah') {
if(isset($_POST['simpan']))
{
	include ("koneksi.php");
	$username = $_POST['txtusername'];
	$level = $_POST['txtlevel'];
	
	$query=mysql_query("insert into user (username,level) 
	values ('$username','$level')");
	
	if($query)
			echo "<script>alert('data anda telah masuk !!!')</script>";
		else
			echo "<script>alert('masukkan data anda secara lengkap !!!')</script>";
	header('location:index.php?page=user');
}
}
else if ($_GET['proses'] == 'update'){
	if(isset($_POST['update']))
{
	include('koneksi.php');
	$ubah=mysql_query("UPDATE user SET 
						username  ='$_POST[txtusername]',
						level = '$_POST[txtlevel]'
					WHERE username  ='$_POST[username]'");
	if($ubah)
		header('location:index.php?page=user');
}
}
else if ($_GET['proses'] == 'delete'){
	include('koneksi.php');
	$username = $_GET['username'];
	$query=mysql_query("DELETE FROM user WHERE username='$username'");
	header('location:index.php?page=user');
}
?>