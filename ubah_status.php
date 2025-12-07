<?php
session_start();
if ($_SESSION['role'] != "admin") {
    header("Location: login.php");
    exit;
}

include "koneksi.php";
$id = $_GET['id'];

if (isset($_POST['update'])) {
    $status = $_POST['status'];
    mysqli_query($conn, "UPDATE layanan SET status='$status' WHERE id='$id'");
    header("Location: dashboard_admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Ubah Status</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">

<h2>Ubah Status Layanan</h2>

<form method="POST">
    <select name="status" class="form-control">
        <option value="menunggu">Menunggu</option>
        <option value="diproses">Diproses</option>
        <option value="selesai">Selesai</option>
    </select>

    <button class="btn btn-primary mt-3" name="update">Simpan</button>
</form>

</body>
</html>
