<?php
include '../../koneksi.php';
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
    echo "Akses ditolak, Halaman ini hanya untuk user";
    exit;
}

$username = $_SESSION['username'];
$query = mysqli_query($conn, "SELECT name FROM users WHERE username = '$username'");
$data = mysqli_fetch_assoc($query);
$nama = $data['name'];

// $result = $conn->query("SELECT * FROM jadwal_dokter");
$jadwal_query = mysqli_query($conn, "
    SELECT jadwal_dokter.*, users.name AS nama_dokter
    FROM jadwal_dokter
    JOIN users ON jadwal_dokter.dokter_id = users.id
    WHERE users.role = 'dokter'
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman User</title>
    <link rel="stylesheet" href="../../assets/css/dash_dokter.css">
</head>
<body>
    <div class="container">
        <div class="beranda">
        <a href="../../index.php"><h3>Eyes|Hospital</h3></a><hr><br>
                <a href="dash.php"><dd>Dashboard</dd></a>
                <a href="jadwal_dokter.php"><dd style="background-color: rgb(255, 255, 255);color: red;">Jadwal Dokter</dd></a>
                <a href="list_booking.php"><dd>List Booking</dd></a>
                <a href="../../logout.php" onClick="return confirm('Yakin ingin keluar?')"><dd>Logout</dd></a>
        </div>
        
        <div class="kotak">
            <h2>Jadwal Dokter</h2>

            <div class="kotak-box">
            <h4>Tabel Jadwal Dokter</h4><hr>
                <table class="tabel-dokter">
                    <tr>
                        <th>ID Jadwal</th>
                        <th>Nama Dokter</th>
                        <th>Hari</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                    </tr>
                        <?php $no = 1; ?>
                        <?php while ($jadwal = mysqli_fetch_assoc($jadwal_query)) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $jadwal['nama_dokter']; ?></td>
                                <td><?= $jadwal['hari']; ?></td>
                                <td><?= $jadwal['jam_mulai']; ?></td>
                                <td><?= $jadwal['jam_selesai']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                </table>
            </div>

        </div>
    </div>
</body>
</html>

