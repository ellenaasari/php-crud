<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		if(isset($_GET['NISN'])){
			$NISN = $_GET['NISN'];
			
			$select = mysqli_query($koneksi, "SELECT * FROM siswa WHERE NISN='$NISN'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			
			}else{
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		if(isset($_POST['submit'])){
			$Nama			  = $_POST['Nama'];
			$Jurusan	= $_POST['Jurusan'];
			$Alamat	= $_POST['Alamat'];

			$sql = mysqli_query($koneksi, "UPDATE siswa SET Nama='$Nama', Jurusan='$Jurusan', Alamat='$Alamat' WHERE NISN='$NISN'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_mhs";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
 
		<form action="index.php?page=edit&NIS=<?php echo $NISN; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">$NISN</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="NIS" class="form-control" size="4" value="<?php echo $data['NISN']; ?>" readonly required>
				</div>
			</div>
				<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nama" class="form-control" value="<?php echo $data['Nama']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jurusan</label>
				<div class="col-md-6 col-sm-6">
					<select name="Jurusan" class="form-control" required>
						<option value="">Pilih Jurusan</option>
						<option value="Rekayasa Perangkat Lunak" <?php if($data['Jurusan'] == 'Rekayasa Perangkat Lunak'){ echo 'selected'; } ?>>Rekayasa Perangkat Lunak</option>
						<option value="Multimedia" <?php if($data['Jurusan'] == 'Multimedia'){ echo 'selected'; } ?>>Multimedia</option>
						<option value="Akuntansi Keuangan Lembaga" <?php if($data['Jurusan'] == 'Akuntansi Keuangan Lembaga'){ echo 'selected'; } ?>>Akuntansi Keuangan Lembaga</option>
						<option value="Otomatisasi Tata Kelola Perkantoran" <?php if($data['Jurusan'] == 'Otomatisasi Tata Kelola Perkantoran'){ echo 'selected'; } ?>>Otomatisasi Tata Kelola Perkantoran</option>
						<option value="Bisnis Daring Pemasaran" <?php if($data['Jurusan'] == 'Bisnis Daring Pemasaran'){ echo 'selected'; } ?>>Bisnis Daring Pemasaran</option>
						<option value="Kriya Kreatif Batik dan Tekstil" <?php if($data['Jurusan'] == 'Kriya Kreatif Batik dan Tekstil'){ echo 'selected'; } ?>>Kriya Kreatif Batik dan Tekstil</option>
					</select>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Alamat" class="form-control" value="<?php echo $data['Alamat']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil_mhs" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
