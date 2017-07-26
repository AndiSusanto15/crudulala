<?php 
include 'class.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah siswa</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		<h2>Tambah siswa</h2>
		<div class="row">
			<div class="col-md-6">
				<!-- untuk input data wajib menambah method=post pada tag form agar php bisa mengambil inputannya -->
				<!-- bila ada file, tmbah enctype=multipart/form-data agar php bisa ambil file untuk upload -->
				<!-- setiap kotak (input,textarea,file, select button) wajib dikasih name agar php bisa mengambil inputan -->
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nama Siswa</label>
						<input type="text" name="nama" class="form-control">
					</div>
					<div class="form-group">
						<label>Jenis Kelamin</label>
						<select class="form-control" name="jk">
							<option>Pilih jenis kelamin</option>
							<option value="laki-laki">Laki laki</option>
							<option value="perempuan">Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control" name="alamat"></textarea>
					</div>
					<div class="form-group">
						<label>Foto</label>
						<input type="file" name="foto">
					</div>
					<button class="btn btn-primary" name="simpan">SIMPAN</button>
					<a href="tampilsiswa.php" class="btn btn-warning">Daftar siswa</a>
				</form>
				<?php 
				
					// mengambil inputan dari dalam formulir gunakan $_POST["nama kotak"]
					// jika ada tombol simpan maka
				if (isset($_POST["simpan"]))
				{
						// obyek siswa mengakses fungsi simpan_siswa(inputan dari form) dan disimpan dalam variabel hasil untuk memudahkan membuat pesan sukses atau gagal
					$hasil = $siswa->simpan_siswa($_POST["nama"],$_POST["jk"],$_POST["alamat"],$_FILES["foto"]);
						// jika output  hasil == sukses mka tampilkan pesan
					if ($hasil=="sukses") {
						echo "<script>alert('Data telah berhasil di tambah');</script>";
						echo "<script>location='tampilsiswa.php'</script>";
					}
					else
					{
						echo "<script>alert('Maaf data gagal di tambahkan');</script>";
						echo "<script>loaction='tambahsiswa.php'</script>";
					}
				}
				?>
			</div>
			<div class="col-md-6 stich center-block">
				<img src="img/Stich.gif" class="img-responsive">
			</div>
		</div>
	</div>
</body>
</html>