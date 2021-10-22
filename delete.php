<?php
include('config.php');

if(isset($_GET['NISN'])){
	$NISN = $_GET['NISN'];

	$cek = mysqli_query($koneksi, "SELECT * FROM siswa WHERE NISN='$NISN'") or die(mysqli_error($koneksi));
	
	if(mysqli_num_rows($cek) > 0){
		
		$del = mysqli_query($koneksi, "DELETE FROM siswa WHERE NISN='$NISN'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="index.php?page=tampil";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="index.php?page=tampil";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="index.php?page=tampil";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="index.php?page=tampil";</script>';
}

?>