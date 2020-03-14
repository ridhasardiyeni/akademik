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
<form action = "aksi_jurusan.php?proses=tambah" method="POST">
<h3><b><center>ENTRY DATA JURUSAN</center></b></h3>
<div class="form-group">
		<label>Nama Jurusan </label>
		<label>: </label>
		<input type="text" name="txtnama_jurusan" class="form-control">
</div>
<div class="form-group">
		<label>Keterangan</label>
		<label> : </label>
		<textarea cols="20" rows="5" name="txtket" class="form-control">
		</textarea>
</div>
<div class="form-group">
		<label></label>
		<label></label>
		<input type="Submit" name="simpan" value="SIMPAN" class="btn btn-success">
</div>
</form>
<?php
break;
case 'list' :
?>

<a href="?page=jurusan&aksi=entry"class= "btn btn-primary"><i class="fa fa-plus-circle" method="POST" role="form"></i>Tambah Data Jurusan</a>
<a href="laporan/report_jurusan.php" class= "btn btn-success" target="_blank"><i class="fa fa-download" method="POST" role="form"></i>Cetak</a>
<table width="100%" class="table table-striped table-hover" id="dataTables-example">
<thead>
		<tr div style="background-color:#FF6666">
		<th> No </th>
		<th> Nama Jurusan </th>
		<th> Keterangan </th>
		<?php
			if($_SESSION['level']=='admin')
				echo "<th> Aksi </th>";
		?>
	</tr>
</thead>
<tbody>
	<?php
		$query=mysql_query("SELECT * FROM jurusan");
		$i=1;
		while($data=mysql_fetch_array($query))
		{
			echo "<tr>
					<td>$i</td>
					<td>$data[nama_jurusan]</td>
					<td>$data[keterangan]</td>";
					if($_SESSION['level']=='admin')
					echo 
					"<td>
					<a href=aksi_jurusan.php?proses=delete&id=$data[id_jurusan] onclick=\"return confirm
					('Yakin akan menghapus data jurusan?')\"class=\"btn btn-danger\"><span class=\"glyphicon glyphicon-trash\"></span>
					</a>
					|
					<a href=?page=jurusan&aksi=edit&id=$data[id_jurusan]
					class=\"btn btn-warning\"><span class=\"glyphicon glyphicon-pencil\"></span>
					</a>
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
	include ('koneksi.php');
	$ambil=mysql_query("SELECT * FROM jurusan WHERE id_jurusan='$_GET[id]'");
	$data=mysql_fetch_array($ambil);
?>
<h3><b><center>UPDATE DATA JURUSAN</center></b></h3>
<form action = "aksi_jurusan.php?proses=update" method="POST">
<div class="form-group">
		<label></label>
		<input type="hidden" name="id" class="form-control"
		 value="<?php echo $data['id_jurusan']?>">
</div>
<div class="form-group">
		<label>Nama Jurusan </label>
		<label>: </label>
		<input type="text" name="txtnama_jurusan" class="form-control"
		 value="<?php echo $data['nama_jurusan']?>">
</div>
<div class="form-group">
		<label>Keterangan</label>
		<label> :</label>
		<textarea cols="20" rows="5" name="txtket" class="form-control">
		<?php echo $data['keterangan']?>
		</textarea>
</div>
<div class="form-group">
		<label></label>
		<label></label>
		<input type="Submit" name="update" value="Update" class="btn btn-success">
</div>
</form>

<?php
break;
	}
?>


