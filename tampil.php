<?php
include('config.php');
?>

	<div class="container" style="margin-top:20px">
		<center><font size="6">DATA SISWA SMK NEGERI 6 JEMBER</font></center>
		<hr>
		<a href="index.php?page=tambah"><button class="btn btn-dark right">Tambah Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>NO.</th>
					<th>NISN</th>
					<th>Nama</th>
					<th>Jurusan</th>
					<th>Alamat</th>
					<th>Pilihan</th>
				</tr>
			</thead>
			<tbody>
				<?php
				
				$sql = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY NISN DESC") or die(mysqli_error($koneksi));
				if(mysqli_num_rows($sql) > 0){
					$no = 1;
					while($data = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$data['NISN'].'</td>
							<td>'.$data['Nama'].'</td>
							<td>'.$data['Jurusan'].'</td>
							<td>'.$data['Alamat'].'</td>
							<td>
								<a href="index.php?page=edit&NISN='.$data['NISN'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="delete.php?NISN='.$data['NISN'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>
	</div>