<?php
	include('koneksi.php');
	$aksi= isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
	switch($aksi)
	{
		case 'entry' :
		
?>
<form action = "aksi_user.php?proses=tambah" method="POST">
<h3><center><b>ENTRY DATA USER</b></center></h3>
<div class="form-group">
		<label>Username </label>
		<label>: </label>
		<input type="text" name="txtusername" class="form-control">
</div>
<div class="form-group">
		<label>Level </label>
		<label>: </label>
		<input type="text" name="txtlevel" class="form-control">
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
<a href="?page=user&aksi=entry"class= "btn btn-primary"><i class="fa fa-plus-circle" method="POST" role="form"></i>+Tambah Data User</a>
<table width="100%" class="table table-striped table-hover" id="dataTables-example">
<thead>
	<tr div style="background-color:#DEFAA9">
		<th> No </th>
		<th> Username </th>
		<th> Level </th>
		<?php
			if($_SESSION['level']=='admin')
				echo "<th> Aksi </th>";
		?>
	</tr>
</thead>
<tbody>
	<?php
		
		$query=mysql_query("SELECT * FROM user");
		$i=1;
		while($data=mysql_fetch_array($query))
		{
			echo "<tr>
					<td>$i</td>
					<td>$data[username]</td>
					<td>$data[level]</td>";
					if($_SESSION['level']=='admin')
					echo 
					"<td>
					<a href=aksi_user.php?proses=delete&username=$data[username] onclick=\"return confirm
					('Yakin akan menghapus data user?')\"class=\"btn btn-danger\"><span class=\"glyphicon glyphicon-trash\"></span>
					</a>
					|
					<a href=?page=user&aksi=edit&username=$data[username]
					class=\"btn btn-warning\"><span class=\"glyphicon glyphicon-edit\"></span>
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
	$ambil=mysql_query("SELECT * FROM user WHERE username='$_GET[username]'");
	$data=mysql_fetch_array($ambil);
?>
<h3><center><b>UPDATE DATA USER</b></center></h3>
<form action = "aksi_user.php?proses=update" method="POST">
<div class="form-group">
		<label></label>
		<label></label>
		<input type="hidden" name="username" class="form-control"
		 value="<?php echo $data['username']?>">
</div>
<div class="form-group">
		<label>Username </label>
		<label> : </label>
		<input type="text" name="txtusername" class="form-control"
		 value="<?php echo $data['username']?>">
</div>
<div class="form-group">
		<label>Level </label>
		<label> : </label>
		<input type="text" name="txtlevel" class="form-control"
		 value="<?php echo $data['level']?>">
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