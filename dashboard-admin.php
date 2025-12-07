<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

$layanan = mysqli_query($conn,
    "SELECT layanan.*, users.nama 
     FROM layanan 
     JOIN users ON users.id = layanan.id_mahasiswa
     ORDER BY layanan.id DESC"
);
?>

<h2>Dashboard Admin</h2>
<p>Selamat datang, <b><?= $_SESSION['nama'] ?></b></p>

<h3>Daftar Pengajuan Layanan</h3>
<table border="1" cellpadding="5">
    <tr>
        <th>Mahasiswa</th>
        <th>Layanan</th>
        <th>Status</th>
        <th>No.WA</th>
        <th>Aksi</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($layanan)) { ?>
    <tr>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['layanan'] ?></td>
        <td><?= $row['status'] ?></td>
        <td><?= $row['wa'] ?></td>
        <td>
            <a href="update-status.php?id=<?= $row['id'] ?>&s=diproses">Proses</a> |
            <a href="update-status.php?id=<?= $row['id'] ?>&s=selesai">Selesai</a> |
            <a href="hapus.php?id=<?= $row['id'] ?>&h=hapus">hapus</a>

        </td>
    </tr>
    <?php } ?>
</table>

<link rel="stylesheet" href="style.css">
<br>
<a href="logout.php">Logout</a>
