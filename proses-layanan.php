<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'mahasiswa') {
    header("Location: login.php");
    exit();
}

if (isset($_POST['layanan'])) {
    $id_mahasiswa = $_SESSION['id'];
    $layanan = $_POST['layanan'];
    $wa = $_POST['wa']; // Ambil nomor WA dari form
    $status = "Menunggu"; // default status

    // Simpan ke tabel layanan
    $query = "INSERT INTO layanan (id_mahasiswa, layanan, wa, status) 
              VALUES ('$id_mahasiswa', '$layanan', '$wa', '$status')";
    mysqli_query($conn, $query);

    header("Location: dashboard-mahasiswa.php");
}
?>
