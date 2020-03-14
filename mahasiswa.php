<head>
	<script src="tinymce/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>
</head>
<?php
	include ('koneksi.php');
	$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
	switch($aksi)
	{
		case 'entry' : 
?>
<form action = "aksi_mahasiswa.php?proses=tambah" method="POST">
<h3><b><center><div class="header"><span>ENTRY DATA MAHASISWA</span></div></center></b></h3>
<div class="form-group">
		<label>NIM </label>
		<input type="text" name="txtnim" class="form-control">
</div>
<div class="form-group">
		<label>Nama Mahasiswa</label>
		<label>: </label>
		<input type="text" name="txtnama" class="form-control">
</div>
<div class="form-group"> 
		<label>Jenis Kelamin</label>
		<label> : </label>
		<br />
		<label><select name="cmbjekel" class="form-control">
			<option value="L">Laki-laki</option>
			<option value="P">Perempuan</option>
		</select>
		</label>
</div>
<div class="form-group">
					<label>Jurusan</label>
					<label>:</label>
					<br />
					<label><select name="txtid_jurusan" id="jurusan" class="form-control">
						<?php
							include('koneksi.php');
							$ambil=mysql_query("SELECT * from jurusan order by nama_jurusan asc");
							while ($data=mysql_fetch_array($ambil))
							{
								echo "<option id='jurusan' value=$data[id_jurusan]>$data[nama_jurusan]</option>";
							}
						?>
					</select></label>
			</div>
			<div class="form-group">
					<label>Prodi </label>
					<label> : </label>
					<br />
					<label><select name="txtid_prodi" id="prodi" class="form-control">
						<?php
							include('koneksi.php');
							$ambil=mysql_query("SELECT * from prodi inner join jurusan on jurusan.id_jurusan=prodi.id_jurusan order by nama_jurusan asc");
							while ($data=mysql_fetch_array($ambil))
							{
								echo "<option id='prodi' class=$data[id_jurusan] value=$data[id_prodi]>$data[nama_prodi]</option>";
							}
						?>
					</select></label>
			</div>
<div class="form-group">
		<label>No Telp</label>
		<label> : </label>
		<br />
		<label><input type="text" name="txtno_telp" class="form-control"></label>
</div>
<div class="form-group">
		<label>Alamat</label>
		<label> : </label>
		<textarea cols="20" rows="5" name="txtalamat" class="form-control">
		</textarea>
</div>
<div class="form-group">
		<label>  </label>
		<label>  </label>
		<label><input type="Submit" name="simpan" value="SIMPAN" class ="btn btn-warning"></label>
</div>
</form>
<?php
break;
case 'list' : 
?>

<a href="?page=mahasiswa&aksi=entry" class= "btn btn-primary"><i class="fa fa-plus-circle" method="POST" role="form"></i>Tambah Data Mahasiswa</a>
<a href="laporan/report_mhs.php" class= "btn btn-success" target="_blank"><i class="fa fa-download" method="POST" role="form"></i>Cetak</a>
<table width="100%" class="table table-striped table-hover" id="dataTables-example">
<thead>
	<tr div style="background-color:#FF6666">
		<th> No </th>
		<th> NIM </th>
		<th> Nama Mahasiswa </th>
		<th> Jenis Kelamin </th>
		<th> Jurusan </th>
		<th> Prodi </th>
		<th> No_telp </th>
		<th> Alamat </th>
		<?php
			if($_SESSION['level']=='admin')
				echo "<th> Aksi </th>";
		?>
		
	</tr>
</thead>
<tbody>
	<?php
		$query=mysql_query("SELECT * FROM mahasiswa,jurusan,prodi
		WHERE mahasiswa.id_jurusan=jurusan.id_jurusan AND 
		mahasiswa.id_prodi=prodi.id_prodi");
		$i=1;
		while($data=mysql_fetch_array($query))
		{
			echo "<tr>
					<td align=center>$i</td>
					<td>$data[nim]</td>
					<td>$data[nama]</td>
					<td align=center>$data[jekel]</td>
					<td align=center>$data[nama_jurusan]</td>
					<td align=center>$data[nama_prodi]</td>
					<td align=center>$data[no_telp]</td>
					<td align=center>$data[alamat]</td>";
					if($_SESSION['level']=='admin')
					echo 
					"<td align=center>
					<a href=aksi_mahasiswa.php?proses=delete&nim=$data[nim] onclick=\"return confirm
					('Yakin akan menghapus data ?')\"class=\"btn btn-danger\"><span class=\"glyphicon glyphicon-trash\"></span>
					</a>
	
					<a href=?page=mahasiswa&aksi=edit&nim=$data[nim]
					class=\"btn btn-warning\"><span class=\"glyphicon glyphicon-pencil\"></span></a>
					</td>
				</tr>";
			$i+=1;
		}
	?>
</tbody>
</table>
<?php
break;
case 'edit' :
?>
<?php
	include('koneksi.php');
	$ambil=mysql_query("SELECT * FROM mahasiswa WHERE nim='$_GET[nim]'");
	$data=mysql_fetch_array($ambil);
?>
<h3><b><center>UPDATE DATA MAHASISWA</center></b></h3>
<form action = "aksi_mahasiswa.php?proses=update" method="POST">
<div class="form-group">
		<label></label>
		<label></label>
		<label><input type="hidden" name="nim" class="form-control"
		value="<?php echo $data['nim']?>"></label>
</div>
<div class="form-group">
		<label>NIM </label>
		<label> : </label>
		<input type="text" name="txtnim" class="form-control"
		value="<?php echo $data['nim']?>">
</div>
<div class="form-group">
		<label>Nama Mahasiswa </label>
		<label>:</label>
		<input type="text" name="txtnama" class="form-control"
		value="<?php echo $data['nama']?>">
</div>
<div class="form-group">
		<label>Jenis Kelamin</label>
		<label> : </label>
		<select name="cmbjekel" class="form-control">
			<option value="L">Laki-laki</option>
			<option value="P">Perempuan</option>
		</select>
		
</div>
<div class="form-group">
		<label>Jurusan </label>
		<label> :</label>
		<select name="txtid_jurusan" class="form-control">
			<?php
				include('koneksi.php');
				$ambiljur=mysql_query("SELECT * FROM jurusan");
				while($datajur=mysql_fetch_array($ambiljur))
				{
					echo "<option value=$datajur[id_jurusan]>$datajur[nama_jurusan]</option>";
				}
			?>
		</select>
</div>
<div class="form-group">
		<label>Prodi </label>
		<label> :</label>
		<select name="txtid_prodi" class="form-control">
			<?php
				include('koneksi.php');
				$ambilpro=mysql_query("SELECT * FROM prodi");
				while($datapro=mysql_fetch_array($ambilpro))
				{
					echo "<option value=$datapro[id_prodi]>$datapro[nama_prodi]</option>";
				}
			?>
		</select>
</div>
<div class="form-group">
		<label>No_Telp </label>
		<label> : </label>
		<input type="text" name="txtno_telp" class="form-control"
		value="<?php echo $data['no_telp']?>">
</div>
<div class="form-group">
		<label>Alamat </label>
		<label> :</label>
		<textarea cols="20" rows="5" name="txtalamat" class="form-control">
		<?php echo $data['alamat']?></textarea>
</div>
<div class="form-group">
		<label></label>
		<label></label>
		<input type="Submit" name="update" value="Update" class ="btn btn-warning">
</div>

</form>
<?php
break;
	}
?>