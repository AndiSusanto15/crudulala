<?php 
include 'class.php'; 

$idsiswa = $_GET['id'];

// obyek siswa mengakses fungsi ambil_siswa disimpan dalam variabel $detailsiswa
$detailsiswa = $siswa->ambil_siswa($idsiswa);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ubah Siswa</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2>Ubah Siswa</h2><hr>

				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama" class="form-control" value="<?php echo $detailsiswa['nama_siswa'];?>">
					</div>
					<div class="form-group">
						<label>Jenis Kelamin</label>
						<select class="form-control" name="jk">
							<option>Pilih Jenis Kelamin</option>
							<option value="laki-laki" <?php if($detailsiswa["kelamin_siswa"]=="laki-laki"){echo "selected";}?>>Laki-laki</option>
							<option value="perempuan" <?php if($detailsiswa["kelamin_siswa"]=="perempuan"){echo "selected";}?>>Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea name="alamat" class="form-control"><?php echo $detailsiswa['alamat_siswa'];?></textarea>
					</div>
					<div class="form-group">
						<img src="foto_siswa/<?php echo $detailsiswa["foto_siswa"];?>" width="150">
					</div>
					<div class="form-group">
						<label>Foto</label>
						<input type="file" name="foto">
					</div>
					<button class="btn btn-primary" name="ubah">Ubah</button>
				</form>

				<?php 
					// jika ada tombol ubah maka
				if (isset($_POST["ubah"])) 
				{
						// obyek siswa mengakses fungsi ubah_siswa(inputan berdasarkan id dari url)
					$hasil = $siswa->ubah_siswa($_POST["nama"],$_POST["jk"],$_POST["alamat"],$_FILES["foto"],$idsiswa);
				}
					// jika hasil = sukses, mk
				if ($hasil=="sukses") 
				{
					echo "<script>alert('Data berhasil di ubah');</script>";
					echo "<script>location='tampilsiswa.php';</script>";
				}
					// selain itu jika gagal
				else
				{
					echo "<script>alert('Data gagal di ubah');<script>";
					echo "<script>location='ubahsiswa.php?=$idsiswa';</script>";
				}
				?>

			</div>
			<div class="col-md-6" class="center-block">
				<img src="img/Stich.gif" class="img-responsive">
			</div>
		</div>
	</div>

</body>
</html>