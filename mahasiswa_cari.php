	
	<div class="col-lg-5">
		<div class="login-panel panel panel-default">
			<div class="panel-heading" style="background:#ff00000">
				<h3 class="panel-title">Pencarian Mahasiwa</h3>
			</div>
			<div class="panel-body">
			<form action ="laporan/report_cari_mahasiswa.php" method="GET" role="form" target="_blank">
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
			<input type="submit" name="cetak" value="Cetak" class="btn btn-lg btn-success btn-block">
			</form>
		</div>
		</div>
	</div>

