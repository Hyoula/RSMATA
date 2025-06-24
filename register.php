<?php
include 'koneksi.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Registrasi</title>
<link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
<div class="background"></div>
<div class="login-box">
    <h2>REGISTRASI</h2>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = md5($_POST['password']);
        
        $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
        if (mysqli_num_rows($check) > 0) {
            echo "<p style='color: red;'>Username sudah terdaftar.</p>";
        } else {
            $query = "INSERT INTO users (name, username, password, role) 
                    VALUES ('$name', '$username', '$password', 'user')";
            if (mysqli_query($conn, $query)) {
                echo "<p style='color: green;'>Registrasi berhasil. Silakan <a href='daftar.php'>login</a>.</p>";
            } else {
                echo "<p style='color: red;'>Terjadi kesalahan. Coba lagi!</p>";
            }
        }
    }
    ?>

    <form action="" method="POST">
    <input name="name" placeholder="Nama Lengkap" required />
    <input name="username" placeholder="Nama Pengguna" required />
    <input type="password" name="password" placeholder="Kata Sandi" required />
    <button type="submit">Daftar</button>
    </form>

    
    <p style="margin-top: 30px; text-align: center;">
        Sudah punya akun?<br> <a href="daftar.php">Masuk di sini</a>
    </p>
</div>
</body>
</html>
