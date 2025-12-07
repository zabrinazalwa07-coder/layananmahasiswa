<?php
if(isset($_POST['simpan'])){

    mysqli_query($koneksi, "INSERT INTO layanan (nama, nim, jenis_layanan, status, wa) VALUES (
        '$_POST[nama]',
        '$_POST[nim]',
        '$_POST[jenis_layanan]',
        '$_POST[status]',
        '$_POST[wa]'
    )");

    echo "<script>alert('Data berhasil ditambah');window.location='dashboard_admin.php';</script>";
}
?>
