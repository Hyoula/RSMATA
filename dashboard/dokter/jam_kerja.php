<?php
include '../../koneksi.php';
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'dokter') {
    echo "Akses ditolak, Halaman ini hanya untuk dokter";
    exit;
}

$username = $_SESSION['username'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
$data = mysqli_fetch_assoc($query);
$nama = $data['name'];
$id = $data['id'];

$dokter_query = mysqli_query($conn, "SELECT * FROM jadwal_dokter WHERE dokter_id = '$id'");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Dokter</title>
    <link rel="stylesheet" href="../../assets/css/dash_dokter.css">
</head>
<body>
    <div class="container">
        <div class="beranda">
        <a href="../../index.php"><h3>Eyes|Hospital</h3></a><hr><br>
                <a href="dash.php"><dd>Dashboard</dd></a>
                <a href="jam_kerja.php"><dd style="background-color: rgb(255, 255, 255);color: red;">Jadwal Kerja</dd></a>
                <a href="jadwal_konsul.php"><dd>Jadwal Konsultasi</dd></a>
                <a href="../../logout.php" onClick="return confirm('Yakin ingin keluar?')"><dd>Logout</dd></a>
        </div>
        
        <div class="kotak">
            <h2>Booking List</h2>
            <div class="kotak-box">
                <h4>Buat Jadwal Kerja</h4><hr>
                <form action="tambah_jamKerja.php" method="POST">
                    <label for="jam_mulai">Pilih Hari : </label>
                    <select name="hari" required>
                        <option value="">Pilih Hari</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                    </select><br><br>
                    <label for="jam_mulai">Jam Mulai</label>
                    <input type="time" name="jam_mulai" placeholder="Jam Mulai" required />
                    <label for="jam_selesai">Jam Selesai</label>
                    <input type="time" name="jam_selesai" placeholder="Jam Selesai" required />
                    <button type="submit" name="submit">Masuk</button>
                </form>
            </div>

            <div class="kotak-box">
            <h4>Tabel Jadwal Kerja</h4><hr>
                <table class="tabel-dokter">
                    <tr>
                        <th>ID Booking</th>
                        <th>Hari Kerja</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $no = 1; ?>
                    <?php while ($jadwal = mysqli_fetch_assoc($dokter_query)) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $jadwal['hari']; ?></td>
                            <td><?= $jadwal['jam_mulai']; ?></td>
                            <td><?= $jadwal['jam_selesai']; ?></td>
                            <td>
                                <a href="edit_jadwal.php?id=<?= $jadwal['id']; ?>" class="aksi edit">Edit</a>
                                <a href="tambah_jamKerja.php?hapus=<?= $jadwal['id']; ?>" class="aksi delete" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>

        </div>
    </div>
</body>
</html>

