<?php
include "koneksi.php";

if (isset($_POST['register'])) {

    $nama     = mysqli_real_escape_string($conn, $_POST['nama']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Cek apakah username sudah ada
    $cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Username sudah digunakan!');</script>";
    } else {
        mysqli_query($conn, 
            "INSERT INTO users(nama, username, password, role) 
             VALUES('$nama', '$username', '$password', 'mahasiswa')"
        );

        echo "<script>alert('Registrasi berhasil! Silakan login.');window.location='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Registrasi Mahasiswa</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="col-md-5 mx-auto">
        <div class="card p-4 shadow">
            <h4 class="text-center mb-3">Registrasi Mahasiswa</h4>

            <form method="POST">

                <div class="mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>No.WA</label>
                    <input type="text" name="wa" class="form-control" required>
                </div>

                <button class="btn btn-primary w-100" name="register">Daftar</button>
            </form>

            <p class="text-center mt-3">
                Sudah punya akun? <a href="login.php">Login</a>
            </p>
        </div>
    </div>
</div>

</body>
</html>
