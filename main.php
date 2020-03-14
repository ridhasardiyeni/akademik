<?php
	$page=isset($_GET['page']) ? $_GET['page'] : 'home';
	if ($page=='home') include ('home.php');
	if ($page=='mahasiswa') include ('mahasiswa.php');
	if ($page=='jurusan') include ('jurusan.php');
	if ($page=='prodi') include ('prodi.php');
	if ($page=='user') include ('user.php');
	if ($page=='dosen') include ('dosen.php');
	if ($page=='matakuliah') include ('matakuliah.php');
	if ($page=='mahasiswa_cari') include ('mahasiswa_cari.php');
	if ($page=='dosen_cari') include ('dosen_cari.php');
?>