<?php
include("koneksi.php");
$no = 1;
// query untuk menampilkan data
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
//pencarian
$q = "";
if (isset($_GET['submit']) && !empty($_GET['q'])) {
    $q = $_GET['q'];
    $sql_where = "WHERE nama LIKE '{$q}%'"; 
}
$title = 'Data Barang';
$sql = 'SELECT * FROM data_barang ';
if (isset($sql_where))
    $sql .= $sql_where;
$result = mysqli_query($conn, $sql);

?>
<header>
<?php require('header.php'); ?>
<style>
form div > label {
			    display: inline-block;
			    width: 100px;
			    height: 30px;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.min.js"></script>
    <title>Data Barang</title>
</head>
<body>
    <div class="container">
        <h1 align="center">Data Barang</h1>
		<table class="table table-striped table-sm">
			<td><td>
		</table>
        <div class="main">
		<div class="btn-toolbar mb-2 mb-md-10">
           <a class="btn btn-primary" href="tambah.php" role="button">Tambah Barang</a>
		</div> 
        <br> </br>
		<form>
                <div class="form-group" action="" method="get" >
                    <label for="q">Cari Barang</label>
                    <input type="text" placeholder="Masukkan Pencarian"  id="q" name="q" class="input-q" value="<?php echo $q ?>">
                    <button type="submit" name="submit" class="btn btn-primary">Cari</button>
                </div>
		</form>
			<div class="main">
				<table border="1" cellpadding="10" cellspacing="0">
				<thead>
					<tr>
						<th>No</th>
						<th>Gambar</th>
						<th>Nama Barang</th>
						<th>Katagori</th>
						<th>Harga Jual</th>
						<th>Harga Beli</th>
						<th>Stok</th>
						<th>Aksi</th>
					</tr>
					<?php if($result): ?>
					<?php while($row = mysqli_fetch_array($result)): ?>
					<tr>
                    <td><?php echo $no++ ?></td>
						<td ><img src="gambar/<?= $row['gambar'];?>" alt="<?=$row['nama'];?>"></td>
						<td><?= $row['nama'];?></td>
						<td><?= $row['kategori'];?></td>
						<td><?= $row['harga_jual'];?></td>
						<td><?= $row['harga_beli'];?></td>
						<td><?= $row['stok'];?></td>
						<td>
						<a class="btn btn-success" href="ubah.php?id=<?= $row['id_barang'];?>" role="button">Ubah</a>
						<a class="btn btn-danger" href="hapus.php?id=<?= $row['id_barang'];?>" role="button">Hapus</a>
					</td>
					</tr>
					<?php endwhile; else: ?>
					<tr>
						<td colspan="7">Belum ada data</td>
					</tr>
					<?php endif; ?>
				</thead>
            </table>
        </div>
    </div>
</div>
<footer>
    <?php require('footer.php'); ?>
</footer>
</body>
</html>