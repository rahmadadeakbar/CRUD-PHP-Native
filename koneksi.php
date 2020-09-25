
<?php
$host = "localhost";
$user = "root";
$pass = "";
$name = "crud";

$koneksi = mysqli_connect($host, $user, $pass, $name) or die("Koneksi ke database gagal!");

if ($koneksi) {
	// echo "database berhasil terkoneksi";
} else {
	echo "database gagal terkoneksi";
}

?>