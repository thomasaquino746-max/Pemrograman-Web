<?php
include 'config/koneksi.php';

$nama = $_POST['nama_tanaman'];
$jenis = $_POST['jenis'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$tanggal = $_POST['tanggal_masuk'];

mysqli_query($koneksi, "INSERT INTO tanaman
(nama_tanaman, jenis, harga, stok, tanggal_masuk)
VALUES
('$nama','$jenis','$harga','$stok','$tanggal')");

header("Location: index.php?pesan=tambah");
exit;
?>