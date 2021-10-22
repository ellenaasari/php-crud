<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$NIS			= $_POST['NISN'];
			$Nama			= $_POST['Nama'];
			$Jurusan	= $_POST['Jurusan'];
			$Alamat		= $_POST['Alamat'];
	

			$cek = mysqli_query($koneksi, "SELECT * FROM siswa WHERE NISN='$NISN'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0 ){
				$sql = mysqli_query($koneksi, "INSERT INTO siswa(NISN, Nama, Jurusan, Alamat) VALUES('$NISN', '$Nama', '$Jurusan', '$Alamat')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, NISN sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">NISN</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="NISN" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nama" class="form-control" required>
				</div>
			</div> 
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jurusan</label>
				<div class="col-md-6 col-sm-6">
					<select name="Jurusan" class="form-control" required>
						<option value="">Pilih Jurusan</option>
						<option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
						<option value="Multimedia">Multimedia</option> 
						<option value="Akuntansi Keuangan Lembaga">Akuntansi Keuangan Lembaga</option>
						<option value="Otomatisasi Tata Kelola Perkantoran">Otomatisasi Tata Kelola Perkantoran</option>
						<option value="Bisnis Daring Pemasaran">Bisnis Daring Pemasaran</option>
						<option value="Kriya Kreatif Batik dan Tekstil">Kriya Kreatif Batik dan Tekstil</option>
					</select>
				</div>
			</div>
            <div class="item from-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
                <div class="col-md-6 col-sm-6">
					<input type="text" name="Alamat" class="form-control" required>
            </div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
