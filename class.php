<?php 
// file koneksi ke mysql
// koneksi dengan database menggunakan mysqli

// membuat skrip koneksi dengan cara membuat obyek mysqli 
$mysqli = new mysqli("localhost","root","andi","trainit-crud");

class siswa
{
	// menambah script koneksi ke class siswa
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	function tampil_siswa() //berisi algoritma untuk menampilkan data dari database
	{
		// 1. dengan koneksi ambil data dari tabel siswa, di simpan dlm variabel $ambilsiswa
		$ambilsiswa = $this->koneksi->query("SELECT * FROM siswa");
		// 2. pecah ke array data yang d ambil dari variabel $ambilsiswa, masukan dalam variabel $pecahsiswa dan di perulangkan 
		while($pecahsiswa = $ambilsiswa->fetch_assoc()) //perulangan menggunakan while untuk mendapatkan semua data tabel
		{
			// 3.masukan smua data siswa ke array 
			$semuasiswa[] = $pecahsiswa; //semua data yang di dapat dari perulangan di simpan dalam variabel $semuasiswa dalam bentuk array 
		}
		// 4. outputkan hasilnya dengan return 
		return $semuasiswa;
	}

	function simpan_siswa($nama,$jk,$alamat,$foto)
	{
		// 1. mengambil nama foto dari array foto untuk nanti di simpan ke tabel siswa kolom foto_siswa
		$namafoto = $foto["name"];
		// 1.1 merename nama foto dengan sesuatu yang tidak pernah sama
		$namafotofix = date("Y_m_d_H_m_d")."_".$namafoto;
		// 2. mengambil lokasi foto nanti di upload 
		$lokasifoto = $foto["tmp_name"];
		// 3. mengambil ekstensi foto 
		$ekstensifoto = pathinfo($namafoto,PATHINFO_EXTENSION);
		// 4. membuat array ekstensi boleh
		$ekstensiboleh = array("jpg","png","jpeg","gif","JPG","PNG");
		// 5. jika ekstensifoto ada di ekstensiboleh, maka
		if (in_array($ekstensifoto, $ekstensiboleh))
		{
			// 5.1 mengupload foto ke folder foto_siswa/namafoto
			// dari lokasifoto 
			move_uploaded_file($lokasifoto, "foto_siswa/$namafotofix");
			// 5.2 query simpan data ke tabel siswa di db
			$this->koneksi->query("INSERT INTO siswa(nama_siswa,kelamin_siswa,alamat_siswa,foto_siswa) VALUES('$nama','$jk','$alamat','$namafotofix')");
			// 5.3 outputkan string sukses
			return "sukses";
		}
		// 6. selain itu (ekstensi terlarang)
		else
		{
			// 6.1 outputkan gagal
			return "gagal";
		}
	}

	function ambil_siswa($id)
	{
		// properti koneksi akses query tampilkan data siswa yg id nya $id atau 5
		$ambilsiswa = $this->koneksi->query("SELECT * FROM siswa WHERE id_siswa='$id'");
		// pecah ke array dan simpan hasilnya dalam variabel $pecahsiswa
		$pecahsiswa = $ambilsiswa->fetch_assoc();
		// outputkan hasil pecah siswa 
		return $pecahsiswa;
	}

	function hapus_siswa($id)
	{
		// A. hapus file foto dari data siswa yang datanya mau di hapus
		// mengakses fungsi ambil_siswa()
		$detailsiswa = $this->ambil_siswa($id);
		// mendapatkan nama fle foto siswa
		$hapusfoto = $detailsiswa['foto_siswa'];
		// jika file ada (folder foto_siswa/hapusfoto), mk hapus filenya
		if (file_exists("foto_siswa/$hapusfoto")) 
		{
			unlink("foto_siswa/$hapusfoto");
		}

		// B. hapus data siswa di tabel siswa
		$this->koneksi->query("DELETE FROM siswa WHERE id_siswa='$id'");
	}

	function ubah_siswa($nama,$jk,$alamat,$foto,$idsiswa)
	{
		// 1. mengambil nama foto
		$namafoto = $foto["name"];

		// 2. mengambil lokasi foto
		$lokasifoto = $foto["tmp_name"];

		// 3. jika tidak kosong lokasi foto (ada inputan foto baru)/foto dirubah
		if (!empty($lokasifoto)) 
		{
			// 3.1 akses fungsi ambil_siswa($id)
			$detailsiswa = $this->ambil_siswa($idsiswa);

			// 3.2 dapatkan nama file foto yang lama
			$fotolama = $detailsiswa["foto_siswa"];

			// 3.3 jika file ada foto yang lama, maka hapus foto yang lama
			if (file_exists("foto_siswa/$fotolama")) 
			{
				unlink("foto_siswa/$fotolama");
			}

			// 3.4 dapatkan ekstensi foto yang baru 
			$ekstensifoto = pathinfo($namafoto,PATHINFO_EXTENSION);

			// 3.5 buat array foto yang di perbolehkan 
			$ekstensiboleh = array("jpg","png","jpeg","gih","JPG","PNG");

			// 3.6 jika ekstensi foto baru yang ada di array ekstensi yang boleh, mk
			if (in_array($ekstensifoto, $ekstensiboleh)) 
			{
			// 3.6.0 rename nama foto dengan waktu
				$namafix = date("Y_m_d_H_m_d")."_".$namafoto;
			// 3.6.1 upload foto yang baru 
				move_uploaded_file($lokasifoto, "foto_siswa/$namafix");

			// 3.6.2 query ubah data termasuk foto
				$this->koneksi->query("UPDATE siswa SET 
					nama_siswa ='$nama',
					kelamin_siswa = '$jk',
					alamat_siswa = '$alamat',
					foto_siswa = '$namafix'
					WHERE id_siswa = '$idsiswa' ");

			// 3.6.3 outputkan sukses
				return "sukses";
			}
			// 3.7 selainitu(ekstensi tidak boleh)
			else
			{
				// 3.7.1 outputkan hasil gagal
				return "gagal";
			}

			
		}
		// 4. selain itu(foto tidak di rubah)
		else
		{
			// 4.1 query ubah data tidak termasuk foto
			$this->koneksi->query("UPDATE siswa SET nama_siswa='$nama', kelamin_siswa='$jk', alamat_siswa='$alamat' WHERE id_siswa='$idsiswa'");
			// 4.2 outputkan sukses
			return "sukses";
		}
	}

}

$siswa = new siswa($mysqli); //memasukan mysqli ke obyek siswa dan mengirim ke function __constract 
?>