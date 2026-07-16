<?php
include 'config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM tanaman WHERE id='$id'");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Tanaman</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow">

<div class="container">

<a class="navbar-brand fw-bold" href="index.php">

<i class="bi bi-flower1"></i>

Sistem Manajemen Koleksi Tanaman Hias

</a>

</div>

</nav>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="card shadow border-0">

<div class="card-header bg-warning">

<h4>

<i class="bi bi-pencil-square"></i>

Edit Data Tanaman

</h4>

</div>

<div class="card-body">

<form action="update.php" method="POST">

<input type="hidden" name="id" value="<?= $row['id']; ?>">

<div class="mb-3">

<label class="form-label fw-semibold">

Nama Tanaman

</label>

<input
type="text"
name="nama_tanaman"
class="form-control"
value="<?= $row['nama_tanaman']; ?>"
required>

</div>

<div class="mb-3">

<label class="form-label fw-semibold">

Jenis

</label>

<select
name="jenis"
class="form-select">

<option value="Indoor" <?= ($row['jenis']=="Indoor") ? "selected":""; ?>>

Indoor

</option>

<option value="Outdoor" <?= ($row['jenis']=="Outdoor") ? "selected":""; ?>>

Outdoor

</option>

</select>

</div>

<div class="row">

<div class="col-md-6 mb-3">

<label class="form-label fw-semibold">

Harga

</label>

<input
type="number"
name="harga"
class="form-control"
value="<?= $row['harga']; ?>"
required>

</div>

<div class="col-md-6 mb-3">

<label class="form-label fw-semibold">

Stok

</label>

<input
type="number"
name="stok"
class="form-control"
value="<?= $row['stok']; ?>"
required>

</div>

</div>

<div class="mb-4">

<label class="form-label fw-semibold">

Tanggal Masuk

</label>

<input
type="date"
name="tanggal_masuk"
class="form-control"
value="<?= $row['tanggal_masuk']; ?>"
required>

</div>

<div class="d-flex justify-content-between">

<a href="index.php" class="btn btn-secondary">

<i class="bi bi-arrow-left"></i>

Kembali

</a>

<button class="btn btn-warning">

<i class="bi bi-check-circle"></i>

Update Data

</button>

</div>

</form>

</div>

</div>

</div>

</div>

</div>

</body>

</html>