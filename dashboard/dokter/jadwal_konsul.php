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

$dokter_query = mysqli_query($conn, "
    SELECT booking_jam.*, users.name AS nama_user
    FROM booking_jam
    JOIN users ON booking_jam.user_id = users.id
    WHERE booking_jam.dokter_id = '$id'
");

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
                <a href="jam_kerja.php"><dd>Jadwal Kerja</dd></a>
                <a href="jadwal_konsul.php"><dd style="background-color: rgb(255, 255, 255);color: red;">Jadwal Konsultasi</dd></a>
                <a href="../../logout.php" onClick="return confirm('Yakin ingin keluar?')"><dd>Logout</dd></a>
        </div>

        <div class="kotak">
            <h2>Booking List</h2>

            <div class="kotak-box">
            <h4>Tabel Konsultasi</h4><hr>
                <table class="tabel-dokter">
                    <tr>
                        <th>ID Konsultasi</th>
                        <th>Nama Pasien</th>
                        <th>Tanggal Booking</th>
                        <th>Jam Booking</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $no = 1; ?>
                    <?php while ($jadwal = mysqli_fetch_assoc($dokter_query)) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $jadwal['nama_user']; ?></td>
                            <td><?= $jadwal['tanggal']; ?></td>
                            <td><?= $jadwal['jam']; ?></td>
                            <td>
                                <?php if ($jadwal['status'] == 'Disetujui') : ?>
                                    <a class="aksi" style="background-color: green; pointer-events: none; opacity: 0.8;">Setuju</a>
                                    <a class="aksi" style="background-color: grey; pointer-events: none;">Tolak</a>

                                <?php elseif ($jadwal['status'] == 'Ditolak') : ?>
                                    <a class="aksi" style="background-color: grey; pointer-events: none;">Setuju</a>
                                    <a class="aksi" style="background-color: crimson; pointer-events: none; opacity: 0.8;">Tolak</a>

                                <?php else : ?>
                                    <a href="proses_status.php?id=<?= $jadwal['id']; ?>&aksi=setuju"
                                    class="aksi" style="background-color: green;"
                                    onclick="return confirm('Setujui konsultasi ini?')">Setuju</a>

                                    <a href="proses_status.php?id=<?= $jadwal['id']; ?>&aksi=tolak"
                                    class="aksi" style="background-color: crimson;"
                                    onclick="return confirm('Tolak konsultasi ini?')">Tolak</a>
                                <?php endif; ?>
                            </td>

                            <td>
                                <a href="edit_permintaan.php?id=<?= $jadwal['id']; ?>" class="aksi edit">Edit</a>
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

