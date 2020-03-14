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
	include('koneksi.php');
	$aksi= isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
	switch($aksi)
	{
		case 'entry' :
		
?>
<form action = "aksi_prodi.php?proses=tambah" method="POST">
<h3><center><b>ENTRY DATA PRODI</b></center></h3>
<div class="form-group">
		<label>Nama Prodi </label>
		<label>: </label>
		<input type="text" name="txtnama_prodi" class="form-control">
</div>
<div class="form-group">
		<label>Keterangan</label>
		<label> : </label>
		<textarea cols="20" rows="5" name="txtket" class="form-control">
		</textarea>
</div>
<div class="form-group">
		<label>Jurusan</label>
		<label> : </label>
		<select name="txtid_jurusan" class="form-control">
			<?php
				include('koneksi.php');
				$ambil=mysql_query("SELECT * from jurusan");
				while ($data=mysql_fetch_array($ambil))
				{
					echo "<option value=$data[id_jurusan]>$data[nama_jurusan]</option>";
				}
			?>
		</select>
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
<?php
include('koneksi.php');
?>
<a href="?page=prodi&aksi=entry"class= "btn btn-primary"><i class="fa fa-plus-circle" method="POST" role="form"></i>Tambah Data Prodi</a>
<a href="laporan/report_prodi.php" class= "btn btn-success" target="_blank"><i class="fa fa-download" method="POST" role="form"></i>Cetak</a>
<table width="100%" class="table table-striped table-hover" id="dataTables-example">
<thead>
		<tr div style="background-color:#FF6666">
		<th> No </th>
		<th> Nama Prodi </th>
		<th> Keterangan </th>
		<th> Jurusan </th>
		<?php
			if($_SESSION['level']=='admin')
				echo "<th> Aksi </th>";
		?>
	</tr>
</thead>
<tbody>
	<?php
		
		$query=mysql_query("SELECT * FROM prodi");
		$i=1;
		while($data=mysql_fetch_array($query))
		{
			$queryjur=mysql_query("SELECT * FROM jurusan WHERE id_jurusan=$data[id_jurusan]");
			$datajur=mysql_fetch_array($queryjur);
			echo "<tr>
					<td align=center>$i</td>
					<td>$data[nama_prodi]</td>
					<td>$data[keterangan]</td>
					<td>$datajur[nama_jurusan]</td>";
					if($_SESSION['level']=='admin')
					echo 
					"<td>
					<a href=aksi_prodi.php?proses=delete&id=$data[id_prodi] onclick=\"return confirm
					('Yakin akan menghapus data prodi?')\"class=\"btn btn-danger\"><span class=\"glyphicon glyphicon-trash\"></span>
					</a>
					|
					<a href=?page=prodi&aksi=edit&id=$data[id_prodi]
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
	include('koneksi.php');
	$ambil=mysql_query("SELECT * FROM prodi WHERE id_prodi='$_GET[id]'");
	$data=mysql_fetch_array($ambil);
?>
<h3><center><b>UPDATE DATA PRODI</b></center></h3>
<form action = "aksi_prodi.php?proses=update" method="POST">
<div class="form-group">
		<label></label>
		<label></label>
		<input type="hidden" name="id" class="form-control"
		 value="<?php echo $data['id_prodi']?>">
</div>
<div class="form-group">
		<label>Nama Prodi </label>
		<label> : </label>
		<input type="text" name="txtnama_prodi" class="form-control"
		 value="<?php echo $data['nama_prodi']?>">
</div>
<div class="form-group">
		<label>Keterangan</label>
		<label> : </label>
		<textarea cols="20" rows="5" name="txtket" class="form-control">
		<?php echo $data['keterangan']?>
		</textarea>
</div>
<div class="form-group">
		<label>Jurusan </label>
		<label> : </label>
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
		<label></label>
		<label></label>
		<input type="Submit" name="update" value="Update" class="btn btn-warning">
</div>
</form>
<?php
break;
	}
?>