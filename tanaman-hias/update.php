<?php
include 'config/koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama_tanaman'];
$jenis = $_POST['jenis'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$tanggal = $_POST['tanggal_masuk'];

mysqli_query($koneksi, "UPDATE tanaman SET
nama_tanaman='$nama',
jenis='$jenis',
harga='$harga',
stok='$stok',
tanggal_masuk='$tanggal'
WHERE id='$id'");

header("Location: index.php?pesan=edit");
exit;
?>