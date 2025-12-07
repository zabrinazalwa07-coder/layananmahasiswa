<?php
include "koneksi.php";

$id = $_GET['id'];
$status = $_GET['s'];

mysqli_query($conn, "UPDATE layanan SET status='$status' WHERE id='$id'");

header("Location: dashboard-admin.php");
exit();
?>
