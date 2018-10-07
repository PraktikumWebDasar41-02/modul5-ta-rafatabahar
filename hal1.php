<form action="" method="post">
	NIM: <input type="text" name="nim"><br>
	Nama: <input type="text" name="nama"  ><br>
	email: <input type="text" name="email" ><br>
	Tanggal Lahir: <input type="date" name="tl"><br>
	Jenis Kelamin: <input type="radio" name="jk" value="Laki-laki">Laki-laki
	<input type="radio" name="jk" value="Perempuan">Perempuan
	<br>
	Program Studi: <select name="prodi">
		<option value="pilih">===Pilih Program Studi===</option>
		<option value="D3 Manajemen Informatika">D3 Manajemen Informatika</option>
		<option value="S1 Desain Interior">S1 Desain Interior</option>
		<option value="D3 Teknik Informatika">D3 Teknik Informatika</option>
		<option value="S1 Sistem Informasi">S1 Sistem Informasi</option>
	</select><br>
	Fakultas: <select name="fakultas">
		<option value="pilih">====Pilih Fakultas======</option>
		<option value="Fakultas Ilmu Terapan">Fakultas Ilmu Terapan</option>
		<option value="Fakultas Industri Kreatif">Fakultas Industri Kreatif</option>
		<option value="Fakultas Rekayasa Industri">Fakultas Rekayasa Industri</option>
	</select><br>
	Komentar: <textarea name="Komentar"></textarea><br>
	<input type="submit" name="submit"><br>
</form>

<?php

	if (isset($_POST['submit'])) {
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$komen = $_POST['Komentar'];
		$tanggal = $_POST['tl'];
		$jenis_kelamin;
		$prodi = $_POST['prodi'];
		$fakultas = $_POST['fakultas'];

		$cek = true;

		if (isset($_POST['jk'])) {
			$jenis_kelamin = $_POST['jk'];
		}

		if (empty($nim)) {
			echo "NIM tidak boleh kosong<br>";
			$cek = false;
		}else{
			if (strlen($nim)!=10 && !is_numeric($nim)) {
				echo "NIM Harus 10 digit dan angka<br>";
				$cek = false;
			}
		}

		if (empty($nama)) {
			echo "Nama tidak boleh kosong<br>";
			$cek = false;
		}else{
			if (strlen($nama)>20) {
				echo "Maksimal panjang nama 20 huruf<br>";
				$cek = false;
			}
		}

		if (empty($email)) {
			echo "Email tidak boleh kosong<br>";
			$cek = false;
		}else{
			if (!strpos($email, '@') || !strpos($email, '.com')) {
				echo "Format email harus @ .com<br>";
				$cek = false;
			}
		}

		if (empty($jenis_kelamin)) {
			echo "Harus memilih jenis kelamin<br>";
			$cek = false;
		}

		if ($prodi=="pilih") {
			echo "Harus memilih program studi<br>";
			$cek = false;
		}

		if ($fakultas=="pilih") {
			echo "Harus memilih faultas<br>";
			$cek = false;
		}

		if (empty($komen)) {
			echo "Komentar tidak boleh kosong<br>";
			$cek = false;
		}else{
			if (str_word_count($komen)<5) {
				echo "Komentar minimal 5 kata<br>";
				$cek = false;
			}
		}


		if ($cek) {
			$koneksi = mysqli_connect('localhost','root','','d_modul5');

			$sql = "INSERT INTO t_jurnal1 values ('$nim','$nama','$email','$komen','$tanggal','$jenis_kelamin','$prodi','$fakultas')";

			if (mysqli_query($koneksi, $sql)) {
				session_start();
				$_SESSION['pk'] = $nim;
				header("Location:hal2.php");
			}else {
				//echo $nim;
				echo "Gagal input ".mysqli_error($koneksi);
			}

		}else {
			echo "Isi data dengan benar";
		}

	}
	?>
