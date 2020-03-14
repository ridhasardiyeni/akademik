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
<form action = "aksi_dosen.php?proses=tambah" method="POST">
<h3><b><center>ENTRY DATA DOSEN</center></b></h3>
<div class="form-group">
		<label>NIP </label>
		<input type="text" name="txtnip" class="form-control">
</div>
<div class="form-group">
		<label>Nama Dosen</label>
		<label>: </label>
		<input type="text" name="txtnama" class="form-control">
</div>
<div class="form-group">
		<label>Email</label>
		<label>: </label>
		<input type="text" name="txtemail" class="form-control">
</div>
<div class="form-group">
		<label>Jenis Kelamin</label>
		<label> : </label>
		<br />
		<label><select name="cmbjk" class="form-control">
			<option value="L">Laki-laki</option>
			<option value="P">Perempuan</option>
		</select>
		</label>
</div>
<div class="form-group">
		<label>No Telp</label>
		<label> : </label>
		<br />
		<label><input type="text" name="txtnotelp" class="form-control"></label>
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

<a href="?page=dosen&aksi=entry" class= "btn btn-primary"><i class="fa fa-plus-circle" method="POST" role="form"></i>Tambah Data Dosen</a>
<a href="laporan/report_dosen.php" class= "btn btn-success" target="_blank"><i class="fa fa-download" method="POST" role="form"></i>Cetak</a>
<table width="100%" class="table table-striped table-hover" id="dataTables-example">
<thead>
		<tr div style="background-color:#FF6666">
		<th> No </th>
		<th> NIP </th>
		<th> Nama Dosen </th>
		<th> Email </th>
		<th> Jenis Kelamin </th>
		<th> No telp </th>
		<th> Alamat </th>
		<?php
			if($_SESSION['level']=='admin')
				echo "<th> Aksi </th>";
		?>
	</tr>
</thead>
<tbody>
	<?php
		$query=mysql_query("SELECT * FROM dosen");
		$i=1;
		while($data=mysql_fetch_array($query))
		{
			echo "<tr>
					<td align=center>$i</td>
					<td>$data[nip]</td>
					<td>$data[nama]</td>
					<td align=center>$data[email]</td>
					<td align=center>$data[jk]</td>
					<td align=center>$data[notelp]</td>
					<td align=center>$data[alamat]</td>";
					if($_SESSION['level']=='admin')
					echo 
					"<td align=center>
					<a href=aksi_user.php?proses=delete&nip=$data[nip] onclick=\"return confirm
					('Yakin akan menghapus data ?')\"class=\"btn btn-danger\"><span class=\"glyphicon glyphicon-trash\"></span>
					</a>
	
					<a href=?page=dosen&aksi=edit&nip=$data[nip]
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
	$ambil=mysql_query("SELECT * FROM dosen WHERE nip='$_GET[nip]'");
	$data=mysql_fetch_array($ambil);
?>
<h3><b><center>UPDATE DATA DOSEN</center></b></h3>
<form action = "aksi_dosen.php?proses=update" method="POST">
<div class="form-group">
		<label></label>
		<label></label>
		<label><input type="hidden" name="nip" class="form-control"
		value="<?php echo $data['nip']?>"></label>
</div>
<div class="form-group">
		<label>NIP </label>
		<label> : </label>
		<input type="text" name="txtnip" class="form-control"
		value="<?php echo $data['nip']?>">
</div>
<div class="form-group">
		<label>Nama Dosen </label>
		<label>:</label>
		<input type="text" name="txtnama" class="form-control"
		value="<?php echo $data['nama']?>">
</div>
<div class="form-group">
		<label>Email </label>
		<label>:</label>
		<input type="text" name="txtemail" class="form-control"
		value="<?php echo $data['email']?>">
</div>
<div class="form-group">
		<label>Jenis Kelamin</label>
		<label> : </label>
		<select name="cmbjk" class="form-control">
			<option value="L">Laki-laki</option>
			<option value="P">Perempuan</option>
		</select>
		
</div>
<div class="form-group">
		<label>No Telp </label>
		<label> : </label>
		<input type="text" name="txtnotelp" class="form-control"
		value="<?php echo $data['notelp']?>">
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