<?php
include '../../koneksi.php';
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
    echo "Akses ditolak, Halaman ini hanya untuk user";
    exit;
}

$username = $_SESSION['username'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
$data = mysqli_fetch_assoc($query);
$nama = $data['name'];
$id = $data['id'];


$dokter_query = mysqli_query($conn, "SELECT * FROM users WHERE role = 'dokter'");

$booking_query = mysqli_query($conn, "
    SELECT booking_jam.*, users.name AS nama_dokter
    FROM booking_jam
    JOIN users ON booking_jam.dokter_id = users.id
    WHERE booking_jam.user_id = '$id'
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
                <a href="jadwal_dokter.php"><dd>Jadwal Dokter</dd></a>
                <a href="list_booking.php"><dd style="background-color: rgb(255, 255, 255);color: red;">List Booking</dd></a>
                <a href="../../logout.php" onClick="return confirm('Yakin ingin keluar?')"><dd>Logout</dd></a>
        </div>
        
        <div class="kotak">
            <h2>Booking List</h2>
            <div class="kotak-box">
                <h4>Buat Jadwal Konsultasi</h4><hr>
                <form action="tambah_konsul.php" method="POST">
                    <label for="jam_mulai">Pilih Status : </label>    
                    <select name="dokter_id" required>
                        <option value="">Pilih Dokter</option>
                        <?php while ($dokter = mysqli_fetch_assoc($dokter_query)) : ?>
                            <option value="<?= $dokter['id']; ?>"><?= $dokter['name']; ?></option>
                        <?php endwhile; ?>
                    </select><br><br>
                    <label for="tanggal">Tanggal Konsultasi</label>
                    <input type="date" name="tanggal" placeholder="Tanggal Konsultasi" required />
                    <label for="jam">Jam Konsultasi</label>
                    <input type="time" name="jam" placeholder="Jam Konsultasi" required />
                    <button type="submit" name="submit">Masuk</button>
                </form>
            </div>

            <div class="kotak-box">
            <h4>Tabel Jadwal Booking</h4><hr>
                <table class="tabel-dokter">
                    <tr>
                        <th>ID Booking</th>
                        <th>Nama Dokter</th>
                        <th>Tanggal Booking</th>
                        <th>Jam Booking</th>
                        <th>Status</th>
                    </tr>
                    <?php $no = 1; ?>
                    <?php while ($booking = mysqli_fetch_assoc($booking_query)) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $booking['nama_dokter']; ?></td>
                            <td><?= $booking['tanggal']; ?></td>
                            <td><?= $booking['jam']; ?></td>
                            <td><?= $booking['status']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

