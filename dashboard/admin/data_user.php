<?php
include '../../koneksi.php';
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    echo "Akses ditolak, Halaman ini hanya untuk admin";
    exit;
}

$username = $_SESSION['username'];
$query = mysqli_query($conn, "SELECT name FROM users WHERE username = '$username'");
$data = mysqli_fetch_assoc($query);
$nama = $data['name'];

$result = $conn->query("SELECT * FROM users WHERE role = 'user'");
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
                    <label for="name">Nama User</label>
                    <input name="name" placeholder="Nama" required />
                    <label for="username">Username</label>
                    <input name="username" placeholder="Username" required />
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Kata Sandi" required />
                    <button type="submit" name="submit">Masuk</button>
                </form>
            </div>

            <div class="kotak-box">
            <h4>Tabel Data User</h4><hr>
                <table class="tabel-dokter">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $no = 1; ?>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['name']; ?></td>
                            <td><?= $row['username']; ?></td>
                            <td>
                                <a href="edit_user.php?id=<?= $row['id']; ?>" class="aksi edit">Edit</a>
                                <a href="tambah_user.php?hapus=<?= $row['id']; ?>" class="aksi delete" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

