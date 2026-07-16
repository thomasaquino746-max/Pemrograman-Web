<?php
include 'config/koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM tanaman WHERE id='$id'");

header("Location: index.php?pesan=hapus");
exit;
?>