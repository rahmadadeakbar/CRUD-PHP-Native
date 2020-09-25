<?php
//mulai proses edit data
//inlcude atau memasukkan file koneksi ke database
include('koneksi.php');
//cek dahulu, jika tombol simpan di klik
if (isset($_POST['update'])) {



	//jika tombol tambah benar di klik maka lanjut prosesnya
	$id = $_POST['id_barang'];	//membuat variabel $id dan datanya dari inputan hidden id_barang
	$nama_barang		= $_POST['nama_barang'];	//membuat variabel $nama_barang dan datanya dari inputan nama brg
	$kategori		= $_POST['kategori'];	//membuat variabel $kategori dan datanya dari inputan sropdown kategori
	$tanggal		= $_POST['tanggal'];	//membuat variabel $tanggal dan datanya dari inputan tanggal
	$harga	= $_POST['harga'];	//membuat variabel $harga dan datanya dari inputan  Harga
	$stok	= $_POST['stok'];	//membuat variabel $stok dan datanya dari inputan  Stok

	//melakukan query dengan perintah UPDATE untuk update data ke database dengan kondisi WHERE id_barang='$id' <- diambil dari inputan hidden id
	$update = mysqli_query($koneksi, "UPDATE barang SET nama_barang='$nama_barang',kategori='$kategori', tanggal_expaired='$tanggal', harga_barang='$harga',stok='$stok' WHERE id_barang='$id'") or die(mysqli_error());

	//jika query update sukses
	if ($update) {

		echo '<script>
		alert("data berhasil di update")
		window.location.href="index.php";
		</script>';	//membuat Link untuk kembali ke halaman edit

	} else {

		echo '<script>
		alert("data gagal di update")
		window.location.href="edit.php";
		</script>';		//Pesan jika proses simpan gagal

	}
} else {	//jika tidak terdeteksi tombol simpan di klik

	//redirect atau dikembalikan ke halaman edit
	echo '<script>window.history.back()</script>';
}
