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
<form action = "aksi_matkul.php?proses=tambah" method="POST">
<h3><b><center>ENTRY DATA MATA KULIAH</center></b></h3>
<div class="form-group">
		<label>Kode Matakuliah </label>
		<input type="text" name="txtmatkul" class="form-control">
</div>
<div class="form-group">
		<label>Nama Matakuliah</label>
		<label>: </label>
		<input type="text" name="txtnama" class="form-control">
</div>
<div class="form-group">
		<label>SKS</label>
		<label>: </label>
		<input type="text" name="txtsks" class="form-control">
</div>
<div class="form-group">
		<label>Jam</label>
		<label> : </label>
		<input type="text" name="txtjam" class="form-control">
</div>
<div class="form-group">
		<label>Keterangan</label>
		<label> : </label>
		<textarea cols="20" rows="5" name="txtket" class="form-control">
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

<a href="?page=matakuliah&aksi=entry" class= "btn btn-primary"><i class="fa fa-plus-circle" method="POST" role="form"></i>Tambah Data Mata Kuliah</a>
<a href="laporan/report_dosen.php" class= "btn btn-success" target="_blank"><i class="fa fa-download" method="POST" role="form"></i>Cetak</a>
<table class="table table-striped table-hover" id="dataTables-example">
	<thead>
			<tr div style="background-color:#FF6666">
		<th> No </th>
		<th> Kode Matakuliah </th>
		<th> Nama Matakuliah </th>
		<th> SKS </th>
		<th> Jam </th>
		<th> Keterangan </th>
		<th> Aksi </th>
	</tr>
	</thead>
	<?php
		$query=mysql_query("SELECT * FROM matakuliah");
		$i=1;
		while($data=mysql_fetch_array($query))
		{
			echo "<tr>
					<td align=center>$i</td>
					<td>$data[kode_matkul]</td>
					<td>$data[nama_matkul]</td>
					<td align=center>$data[sks]</td>
					<td align=center>$data[jam]</td>
					<td align=center>$data[keterangan]</td>
					<td align=center>
					<a href=aksi_matkul.php?proses=delete&kode_matkul=$data[kode_matkul] onclick=\"return confirm
					('Yakin akan menghapus data ?')\"class=\"btn btn-danger\"><span class=\"glyphicon glyphicon-trash\"></span></a>
	
					<a href=?page=matakuliah&aksi=edit&kode_matkul=$data[kode_matkul]
					class=\"btn btn-warning\"><span class=\"glyphicon glyphicon-pencil\"></span></a>
					</td>
				</tr>";
			$i+=1;
		}
	?>
	</tr>
	</thead>
	</table>
</table>
<?php
break;
case 'edit' :
?>
<?php
	include('koneksi.php');
	$ambil=mysql_query("SELECT * FROM matakuliah WHERE kode_matkul='$_GET[kode_matkul]'");
	$data=mysql_fetch_array($ambil);
?>
<h3><b><center>UPDATE DATA MATAKULIAH</center></b></h3>
<form action = "aksi_matkul.php?proses=update" method="POST">
<div class="form-group">
		<label></label>
		<label></label>
		<label><input type="hidden" name="kode_matkul" class="form-control"
		value="<?php echo $data['kode_matkul']?>"></label>
</div>
<div class="form-group">
		<label>Kode Matakuliah </label>
		<label> : </label>
		<input type="text" name="txtmatkul" class="form-control"
		value="<?php echo $data['kode_matkul']?>">
</div>
<div class="form-group">
		<label>Nama Matakuliah </label>
		<label>:</label>
		<input type="text" name="txtnama" class="form-control"
		value="<?php echo $data['nama_matkul']?>">
</div>
<div class="form-group">
		<label>SKS </label>
		<label>:</label>
		<input type="text" name="txtsks" class="form-control"
		value="<?php echo $data['sks']?>">
</div>
<div class="form-group">
		<label>Jam</label>
		<label> : </label>
		<input type="text" name="txtjam" class="form-control"
		value="<?php echo $data['jam']?>">
</div>
<div class="form-group">
		<label>Keterangan </label>
		<label> :</label>
		<textarea cols="20" rows="5" name="txtket" class="form-control">
		<?php echo $data['keterangan']?></textarea>
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