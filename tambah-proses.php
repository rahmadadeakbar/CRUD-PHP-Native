<?php
//mulai proses tambah data
//inlcude atau memasukkan file koneksi ke database
include('koneksi.php');
//cek dahulu, jika tombol tambah di klik
if (isset($_POST['tambah'])) {
	//jika tombol tambah benar di klik maka lanjut prosesnya
	$id_barang = uniqid(); //uniqid untuk field id_barang di database
	$nama_barang		= $_POST['nama_barang'];	//membuat variabel $nama dan datanya dari inputan Nama Lengkap
	$kategori		= $_POST['kategori'];	//membuat variabel $kategori dan datanya dari inputan dropdown Kategori
	$tanggal	= $_POST['tanggal'];	//membuat variabel $tanggal dan datanya dari inputan tanggal expaired
	$harga	= $_POST['harga'];	//membuat variabel $harga dan datanya dari inputan harga barang
	$stok	= $_POST['stok'];	//membuat variabel $stok dan datanya dari inputan stok barang

	//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
	$input = mysqli_query($koneksi, "INSERT INTO barang VALUES('$id_barang','$nama_barang','$kategori','$tanggal','$harga','$stok')") or die(mysqli_error());

	//jika query input sukses
	if ($input) {
		echo '<script>alert("data berhasil di tambah")
            window.location.href="index.php"</script>';	//membuat Link untuk kembali ke halaman index

	} else {

		echo '<script>alert("data gagal di tambah")
            window.location.href="tambah.php";</script>';	//membuat Link untuk kembali ke halaman indes

	}
} else {	//jika tidak terdeteksi tombol tambah di klik

	//redirect atau dikembalikan ke halaman tambah
	echo '<script>window.history.back()</script>';
}
