<?php
//memulai proses hapus data
//inlcude atau memasukkan file koneksi ke database
include('koneksi.php');

//cek dahulu, apakah benar URL sudah ada GET id -> hapus.php?id=id_barang
if (isset($_GET['id'])) {



	//membuat variabel $id yg bernilai dari URL GET id -> hapus.php?id=id_barang
	$id = $_GET['id'];

	//cek ke database apakah ada data barang dengan id_barang='$id'
	$cek = mysqli_query($koneksi, "SELECT id_barang FROM barang WHERE id_barang='$id'") or die(mysqli_error());

	//jika data barang tidak ada
	if (mysqli_num_rows($cek) == 0) {

		//jika data tidak ada, maka redirect atau dikembalikan ke halaman beranda
		echo '<script>window.history.back()</script>';
	} else {

		//jika data ada di database, maka melakukan query DELETE table barang dengan kondisi WHERE id_barang='$id'
		$del = mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang='$id'");

		//jika query DELETE berhasil
		if ($del) {

			echo '<script>alert("data berhasil di hapus")
			window.location.href="index.php"
			</script>';		//Pesan jika proses hapus berhasil

		} else {

			echo '<script>alert("data Gagal di input")
			window.location.href="biodata.php"
			</sript> ';		//Pesan jika proses hapus gagal

		}
	}
} else {

	//redirect atau dikembalikan ke halaman beranda
	echo '<script>window.history.back()</script>';
}
