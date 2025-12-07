<?php
session_start();
include "koneksi.php";

if(isset($_POST['login'])){

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Cek user berdasarkan username
    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    $user = mysqli_fetch_assoc($query);

    if ($user) {
        // Verifikasi password hash
        if (password_verify($password, $user['password'])) {

            // Set session
            $_SESSION['id'] = $user['id'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['role'] = $user['role'];

            // Arahkan sesuai role
            if ($user['role'] == "admin") {
                header("Location: dashboard-admin.php");
            } else {
                header("Location: dashboard-mahasiswa.php");
            }
            exit;
        }
    }

    $error = "Username atau Password salah!";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="col-md-4 mx-auto">
        <div class="card p-4 shadow">
            <h4 class="text-center mb-3">Login Layanan Mahasiswa</h4>

            <?php if(isset($error)){ ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php } ?>

            <form method="POST">
                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button class="btn btn-primary w-100" name="login">Login</button>
            </form>

            <p class="text-center mt-3">
                Belum punya akun? <a href="register.php">Daftar</a>
            </p>
        </div>
    </div>
</div>

</body>
</html>
