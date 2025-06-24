<?php
include 'koneksi.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <div class="background"></div>
    <div class="login-box">
        <h2>MASUK</h2>
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $username = $_POST['username'];
                $password = md5($_POST['password']);
                $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    $user = mysqli_fetch_assoc($result);
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['role'] = $user['role'];
                    if($_SESSION['role'] === 'admin'){
                        header("Location: dashboard/admin/dash.php");
                    }elseif($_SESSION['role'] === 'dokter'){
                        header("Location: dashboard/dokter/dash.php");
                    }else{
                        header("Location: dashboard/user/dash.php");
                    }
                    exit;
                }else{
                    echo "<p style='color: red;'>Login gagal. Coba lagi!</p>";
                }
            }
        ?>
        <form action="" method="POST">
            <input name="username" placeholder="Nama Pengguna" required />
            <input type="password" name="password" placeholder="Kata Sandi" required />
            <button type="submit">Masuk</button>
        </form>

        <p style="margin-top: 30px; text-align: center;">
            Belum punya akun sebagai pasien?<br> <a href="register.php">Daftar di sini</a>
        </p>
    </div>
</body>
</html>
