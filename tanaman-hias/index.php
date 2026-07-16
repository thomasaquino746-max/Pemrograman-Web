<?php
include 'config/koneksi.php';

// Statistik
$totalTanaman = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM tanaman"))['total'];
$totalStok = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT SUM(stok) AS total FROM tanaman"))['total'];
$totalNilai = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT SUM(harga * stok) AS total FROM tanaman"))['total'];

// Pencarian
$cari = "";

if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];

    $query = mysqli_query($koneksi, "SELECT * FROM tanaman
        WHERE nama_tanaman LIKE '%$cari%'
        ORDER BY id DESC");
} else {

    $query = mysqli_query($koneksi, "SELECT * FROM tanaman
        ORDER BY id DESC");
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Sistem Manajemen Koleksi Tanaman Hias</title>

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

<div class="container mt-4">

    <?php if(isset($_GET['pesan'])){ ?>

        <?php if($_GET['pesan']=="tambah"){ ?>

            <div class="alert alert-success alert-dismissible fade show">

                <strong>Berhasil!</strong>

                Data tanaman berhasil ditambahkan.

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>

        <?php } ?>

        <?php if($_GET['pesan']=="edit"){ ?>

            <div class="alert alert-warning alert-dismissible fade show">

                <strong>Berhasil!</strong>

                Data tanaman berhasil diperbarui.

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>

        <?php } ?>

        <?php if($_GET['pesan']=="hapus"){ ?>

            <div class="alert alert-danger alert-dismissible fade show">

                <strong>Berhasil!</strong>

                Data tanaman berhasil dihapus.

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>

        <?php } ?>

    <?php } ?>

    <h3 class="mb-4">Dashboard</h3>

    <!-- CARD STATISTIK -->

    <div class="row mb-4">

        <div class="col-md-4 mb-3">

            <div class="card shadow border-0">

                <div class="card-body text-center">

                    <h5>🌿 Total Tanaman</h5>

                    <h2 class="text-success">
                        <?= $totalTanaman ?>
                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card shadow border-0">

                <div class="card-body text-center">

                    <h5>📦 Total Stok</h5>

                    <h2 class="text-primary">
                        <?= $totalStok ?? 0 ?>
                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card shadow border-0">

                <div class="card-body text-center">

                    <h5>💰 Total Nilai Koleksi</h5>

                    <h4 class="text-danger">

                        Rp <?= number_format($totalNilai ?? 0,0,',','.') ?>

                    </h4>

                </div>

            </div>

        </div>

    </div>

    <!-- SEARCH -->

    <div class="row mb-3">

        <div class="col-md-6">

            <form method="GET">

                <div class="input-group">

                    <input
                        type="text"
                        name="cari"
                        class="form-control"
                        placeholder="Cari nama tanaman..."
                        value="<?= $cari ?>">

                    <button class="btn btn-success">

                        Cari

                    </button>

                </div>

            </form>

        </div>

        <div class="col-md-6 text-md-end mt-3 mt-md-0">

            <a href="tambah.php" class="btn btn-success">

                + Tambah Tanaman

            </a>

        </div>

    </div>

    <!-- TABEL -->

    <div class="card shadow">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover table-bordered align-middle">

                    <thead class="table-success">

                    <tr>

                        <th>No</th>

                        <th>Nama Tanaman</th>

                        <th>Jenis</th>

                        <th>Harga</th>

                        <th>Stok</th>

                        <th>Tanggal Masuk</th>

                        <th width="180">Aksi</th>

                    </tr>

                    </thead>

                    <tbody>

                    <?php

                    $no = 1;

                    while($data = mysqli_fetch_assoc($query)){

                    ?>

                    <tr>

                        <td><?= $no++; ?></td>

                        <td><?= $data['nama_tanaman']; ?></td>

                        <td>

                            <?php

                            if($data['jenis']=="Indoor"){

                                echo "<span class='badge bg-success'>Indoor</span>";

                            }else{

                                echo "<span class='badge bg-primary'>Outdoor</span>";

                            }

                            ?>

                        </td>

                        <td>

                            Rp <?= number_format($data['harga'],0,',','.') ?>

                        </td>

                        <td>

                            <?= $data['stok']; ?>

                        </td>

                        <td>

                            <?= date('d-m-Y', strtotime($data['tanggal_masuk'])); ?>

                        </td>

                        <td>

                            <a href="edit.php?id=<?= $data['id']; ?>" class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <a href="hapus.php?id=<?= $data['id']; ?>"
                               onclick="return confirm('Yakin ingin menghapus data ini?')"
                               class="btn btn-danger btn-sm">

                                Hapus

                            </a>

                        </td>

                    </tr>

                    <?php } ?>

                    <?php if(mysqli_num_rows($query)==0){ ?>

                    <tr>

                        <td colspan="7" class="text-center">

                            Data tanaman tidak ditemukan.

                        </td>

                    </tr>

                    <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>