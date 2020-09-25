<!DOCTYPE html>
<html>

<head>
	<title>Membuat Crud Sederhana</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div class="judul">
		<h2>CRUD SEDERHANA KODINGASYIK</h2>
	</div>

	<br>
	<a class="tombol" href="index.php">Beranda</a> / <a class="tombol" href="tambah.php">Tambah Data</a>

	<h3>Data Barang</h3>

	<table border="1" class="table">
		<tr>
			<th>No.</th>
			<th>Nama Barang</th>
			<th>Harga</th>
			<th>Kategori</th>
			<th>Stok</th>
			<th>Opsi</th>
		</tr>

		<?php
		//iclude file koneksi ke database
		include('koneksi.php');

		//query ke database dg SELECT table siswa diurutkan berdasarkan NIS paling besar
		$query = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY id_barang DESC") or die(mysqli_error());

		//cek, apakakah hasil query di atas mendapatkan hasil atau tidak (data kosong atau tidak)
		if (mysqli_num_rows($query) == 0) {	//ini artinya jika data hasil query di atas kosong

			//jika data kosong, maka akan menampilkan row kosong
			echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
		} else {	//else ini artinya jika data hasil query ada (data diu database tidak kosong)

			//jika data tidak kosong, maka akan melakukan perulangan while
			$no = 1;	//membuat variabel $no untuk membuat nomor urut
			while ($data = mysqli_fetch_assoc($query)) {	//perulangan while dg membuat variabel $data yang akan mengambil data di database

				//menampilkan row dengan data di database
				echo '<tr>';
				echo '<td>' . $no . '</td>';	//menampilkan nomor urut
				echo '<td>' . $data['nama_barang'] . '</td>';	//menampilkan data nis dari database
				echo '<td>' . $data['kategori'] . '</td>';	//menampilkan data nama lengkap dari database
				echo '<td>Rp.' . $data['harga_barang'] . '</td>';	//menampilkan data kelas dari database
				echo '<td>' . $data['stok'] . '</td>';	//menampilkan data jurusan dari database
				echo '<td><a href="edit.php?id=' . $data['id_barang'] . '">Edit</a> / <a href="hapus.php?id=' . $data['id_barang'] . '" onclick="return confirm(\'Yakin?\')">Hapus</a></td>';	//menampilkan link edit dan hapus dimana tiap link terdapat GET id -> ?id=siswa_id
				echo '</tr>';

				$no++;	//menambah jumlah nomor urut setiap row

			}
		}
		?>
	</table>
</body>

</html>