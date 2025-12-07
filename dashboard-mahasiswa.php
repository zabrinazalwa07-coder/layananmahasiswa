<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'mahasiswa') {
    header("Location: login.php");
    exit();
}

$id = $_SESSION['id'];
$layanan = mysqli_query($conn, "SELECT * FROM layanan WHERE id_mahasiswa='$id'");
?>

<h2>Dashboard Mahasiswa</h2>
<p>Selamat datang, <b><?= $_SESSION['nama'] ?></b></p>

<h3>Ajukan Layanan</h3>
<form method="post" action="proses-layanan.php">
    <select name="layanan" required>
        <option value="">-- Pilih Layanan --</option>
        <option>pembuatan makalah</option>
        <option>pembuatan ppt</option>
        <option>pembuatan artikel</option>
        <option>pembuatan poster</option>
    </select>
     <br><br>

    <label>Nomor WhatsApp:</label><br>
    <input type="text" name="wa" placeholder="Contoh: 081234567890" required>

    <br><br>
    <button type="submit">Kirim</button>
</form>


<hr>

<h3>Status Pengajuan</h3>
<table border="1" cellpadding="5">
    <tr>
        <th>Layanan</th>
        <th>Status</th>
        <th>No.WA</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($layanan)) { ?>
    <tr>
        <td><?= $row['layanan'] ?></td>
        <td><?= $row['status'] ?></td>
        <td><?= $row['wa'] ?></td>
    </tr>
    <?php } ?>
</table>
<link rel="stylesheet" href="style.css">

<br>
<a href="logout.php">Logout</a>
