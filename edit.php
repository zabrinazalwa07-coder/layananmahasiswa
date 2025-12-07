<?php
session_start();
include "koneksi.php";
if(!isset($_SESSION['admin'])){ header("location:index.php"); }

$id = $_GET['id'];
$d = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM layanan WHERE id='$id'"));
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Layanan</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">
    <h3>Edit Layanan</h3>

    <form method="POST">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= $d['nama']; ?>">
        </div>

        <div class="mb-3">
            <label>NIM</label>
            <input type="text" name="nim" class="form-control" value="<?= $d['nim']; ?>">
        </div>

        <div class="mb-3">
            <label>Layanan</label>
            <input type="text" name="jenis_layanan" class="form-control" value="<?= $d['jenis_layanan']; ?>">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-select">
                <option <?= ($d['status']=="Menunggu")?"selected":""; ?>>Menunggu</option>
                <option <?= ($d['status']=="Diproses")?"selected":""; ?>>Diproses</option>
                <option <?= ($d['status']=="Selesai")?"selected":""; ?>>Selesai</option>
            </select>
        </div>
        <div class="mb-3">
            <label>No.WA</label>
            <input type="text" name="wa" class="form-control" value="<?= $d['wa']; ?>">
        </div>

        <button class="btn btn-primary" name="update">Update</button>
        <a href="dashboard_admin.php" class="btn btn-secondary">Kembali</a>
    </form>

    <?php
    if(isset($_POST['update'])){
        mysqli_query($koneksi, "UPDATE layanan SET 
            nama='$_POST[nama]',
            nim='$_POST[nim]',
            jenis_layanan='$_POST[jenis_layanan]',
            status='$_POST[status]',
            wa='$_POST[wa]'
            WHERE id='$id'
        ");

        echo "<script>alert('Data berhasil diupdate');window.location='dashboard_admin.php';</script>";
    }
    ?>
</div>

</body>
</html>
