<?php
include '../../koneksi.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM users WHERE id=$id");
$data = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="../../assets/css/dash_dokter.css">
</head>
<body>
    <div class="container">
        <div class="beranda">
        <a href="../../index.php"><h3>Eyes|Hospital</h3></a><hr><br>
                <a href="dash.php"><dd>Dashboard</dd></a>
                <a href="data_dokter.php"><dd>Data Dokter</dd></a>
                <a href="data_user.php"><dd  style="background-color: rgb(255, 255, 255);color: red;">Data User</dd></a>
                <a href="data_lokasi.php"><dd>Data Lokasi</dd></a>
                <a href="../../logout.php" onClick="return confirm('Yakin ingin keluar?')"><dd>Logout</dd></a>
        </div>
        
        <div class="kotak">
            <h2>Data User</h2>
            <div class="kotak-box">
                <h4>Tambah Data User</h4><hr>
                <form action="tambah_user.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                    <label for="name">Nama User</label>
                    <input type="text" name="name" value="<?php echo $data['name']; ?>" required />
                    <label for="username">Username</label>
                    <input type="text" name="username" value="<?php echo $data['username']; ?>" required />
                    <label for="password">Password</label>
                    <input type="password" name="password" />
                    <button type="submit" name="submit">Masuk</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

