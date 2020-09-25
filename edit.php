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


	<p><a href="index.php">Beranda</a> / <a href="tambah.php">Tambah Data</a></p>

	<h3>Edit Data Barang</h3>

	<?php
	//proses mengambil data ke database untuk ditampilkan di form edit berdasarkan id_barang yg didapatkan dari GET id -> edit.php?id=id_barang

	//include atau memasukkan file koneksi ke database
	include('koneksi.php');

	//membuat variabel $id yg nilainya adalah dari URL GET id -> edit.php?id=id_barang
	$id = $_GET['id'];

	//melakukan query ke database dg SELECT table barang dengan kondisi WHERE id_barang = '$id'
	$show = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang='$id'");

	//cek apakah data dari hasil query ada atau tidak
	if (mysqli_num_rows($show) == 0) {

		//jika tidak ada data yg sesuai maka akan langsung di arahkan ke halaman depan atau beranda -> index.php
		echo '<script>window.history.back()</script>';
	} else {

		//jika data ditemukan, maka membuat variabel $data
		$data = mysqli_fetch_assoc($show);	//mengambil data ke database yang nantinya akan ditampilkan di form edit di bawah

	}
	?>

	<form action="edit-proses.php" method="POST">
		<input type="hidden" name="id_barang" value="<?= $data['id_barang']; ?>"> <!-- membuat inputan hidden dan nilainya adalah id_barang -->
		<table cellpadding="3" cellspacing="0">
			<tr>
				<td>Nama Barang</td>
				<td>:</td>
				<td><input type="text" name="nama_barang" size="30" value="<?= $data['nama_barang'] ?>" required></td>
			</tr>
			<tr>
				<td>Kategori</td>
				<td>:</td>
				<td>
					<?php if (empty($data['kategori'])) { ?>
						<select name="kategori" required>
							<option value="">Pilih Kategori</option>
							<option value="makanan">Makanan</option>
							<option value="minuman">Minuman</option>
							<option value="peralatan mandi">Peralatan Mandi</option>
						</select>
					<?php } else { ?>
						<select name="kategori" required>
							<option value="">Pilih Kategori</option>
							<option <?php echo ($data['kategori'] == 'makanan') ? 'selected' : '' ?> value="makanan">Makanan</option>
							<option <?php echo ($data['kategori'] == 'minuman') ? 'selected' : '' ?> value="minuman">Minuman</option>
							<option <?php echo ($data['kategori'] == 'peralatan mandi') ? 'selected' : '' ?> value="peralatan mandi">Peralatan Mandi</option>
						</select>
					<?php } ?>

				</td>
			</tr>
			<tr>
				<td>Tanggal Expaired</td>
				<td>:</td>
				<td><input type="date" name="tanggal" size="30" value="<?= $data['tanggal_expaired'] ?>" required></td>
			</tr>
			<tr>
				<td>Harga Barang</td>
				<td>:</td>
				<td><input type="number" name="harga" size="30" value="<?= $data['harga_barang'] ?>" required></td>
			</tr>
			<tr>
				<td>Stok Barang</td>
				<td>:</td>
				<td><input type="number" name="stok" size="30" value="<?= $data['stok'] ?>" required></td>
			</tr>

			<tr>
				<td>&nbsp;</td>
				<td></td>
				<td><button type="submit" name="update">Update</td>
			</tr>
		</table>
	</form>
</body>

</html>