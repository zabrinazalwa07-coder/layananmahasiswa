<?php
session_start();
include "koneksi.php";

// Cek apakah role admin
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}

// Cek apakah id dikirim melalui GET
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // pastikan id angka

    // Hapus data dari tabel layanan
    $query = "DELETE FROM layanan WHERE id='$id'";
    mysqli_query($conn, $query);
}

// Redirect kembali ke dashboard admin
header("Location: dashboard-admin.php");
exit;
?>
