<?php 
	include 'class.php';

	// menghapus data siswa yang id_siswa ada di url
	// rulenya adalah mengambil segala sesuatu dari url gunakan $_GET['namakotak']

	// obyek siswa mengakses fungsi hapus_siswa(yang id nya ada di url)
	$siswa->hapus_siswa($_GET['id']);
	echo "<script>alert('Data Berhasil di hapus')</script>";
	echo "<script>location='tampilsiswa.php'</script>";
?>