	<?php 
		// panggil file clas.php
	include 'class.php';

	// obyek siswa mengakses fungsi tampil_siswa()
	$semuasiswa = $siswa->tampil_siswa(); //menyimpan semua data yang di ambil dalam bentuk array tadi kedalam variabel $semuasiswa
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Data Siswa</title>
		<link rel="stylesheet" href="css/bootstrap.css">
	</head>
	<body>
		<div class="container">
			<h2 class="text-center">Data Siswa SD Luar Binasa</h2><hr>
			<table class="table table-bordered table-striped">
				<thead class="text-center">
					<tr class="bg-primary">
						<th class="text-center">Foto</th>
						<th class="text-center">Nama</th>
						<th class="text-center">Jenis Kelamin</th>
						<th class="text-center">Alamat</th>
						<th class="text-center">Foto</th>
						<th class="text-center">Pilihan</th>
					</tr>
				</thead>
				<tbody>

					<?php foreach ($semuasiswa as $k => $val): ?>
						<tr>
							<td><div class="text-center"><img src="foto_siswa/<?php echo $val["foto_siswa"];?>" class='img-circle' width='50' height='50'></div></td>
							<td><?php echo $val["nama_siswa"]; ?></td>
							<td><?php echo $val["kelamin_siswa"]; ?></td>
							<td><?php echo $val["alamat_siswa"]; ?></td>
							<td><?php echo $val["foto_siswa"]; ?></td>
							<td><div class="text-center"><a class="btn btn-danger" href="hapussiswa.php?id=<?php echo $val["id_siswa"]; ?>">Hapus</a> <a href="ubahsiswa.php?id=<?php echo $val["id_siswa"]; ?>" class="btn btn-warning">Ubah</a></div></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<a href="tambahsiswa.php" class="btn btn-primary">Tambah Data</a>
		</div>
	</body>
	</html>