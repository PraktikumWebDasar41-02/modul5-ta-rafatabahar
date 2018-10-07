<?php

	session_start();
	$koneksi = mysqli_connect('localhost','root','','d_modul5');

	$pk = $_SESSION['pk'];
	//echo $pk;

	$sql = "SELECT * FROM t_jurnal1 WHERE NIM = '$pk' ";
	$query = mysqli_query($koneksi, $sql);
	$hasil = mysqli_fetch_array($query);

	echo "NIM : ".$hasil['NIM']."<br>";
	echo "Nama : ".$hasil['Nama']."<br>";
	echo "Email : ".$hasil['email']."<br>";
	echo "Tanggal Lahir : ".$hasil['Tanggal Lahir']."<br>";
	echo "Jenis Kelamin : ".$hasil['Jenis Kelamin']."<br>";
	echo "Program Studi : ".$hasil['Program Studi']."<br>";
	echo "Fakultas : ".$hasil['Fakultas']."<br>";
	echo "komentar : ".$hasil['komentar']."<br>";

	session_destroy();
?>
<br>
<a href="hal1.php">back</a>
