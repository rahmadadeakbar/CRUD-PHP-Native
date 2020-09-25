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

	<h3>Tambah Data Barang</h3>

	<form action="tambah-proses.php" method="POST">
		<table cellpadding="3" cellspacing="0">
			<tr>
				<td>Nama Barang</td>
				<td>:</td>
				<td><input type="text" name="nama_barang" size="30" required></td>
			</tr>
			<tr>
				<td>Kategori</td>
				<td>:</td>
				<td>
					<select name="kategori" required>
						<option value="">Pilih Kategori</option>
						<option value="makanan">Makanan</option>
						<option value="minuman">Minuman</option>
						<option value="peralatan mandi">Peralatan Mandi</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Tanggal Expaired</td>
				<td>:</td>
				<td><input type="date" name="tanggal" size="30" required></td>
			</tr>
			<tr>
				<td>Harga Barang</td>
				<td>:</td>
				<td><input type="number" name="harga" size="30" required></td>
			</tr>
			<tr>
				<td>Stok Barang</td>
				<td>:</td>
				<td><input type="number" name="stok" size="30" required></td>
			</tr>

			<tr>
				<td>&nbsp;</td>
				<td></td>
				<td><button type="submit" name="tambah">Tambah</td>
			</tr>
		</table>
	</form>
</body>

</html>