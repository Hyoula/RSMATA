<?php
include '../../koneksi.php';
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'dokter') {
    echo "Akses ditolak, Halaman ini hanya untuk dokter";
    exit;
}
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM booking_jam WHERE id=$id");
$data = $result->fetch_assoc();
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
                <h4>Buat Jadwal Kerja</h4><hr>
                <form action="tambah_jamKerja.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>" >
                    
                    <label for="status">Pilih Status : </label>
                    <select name="status" required>
                        <option value="">Ubah Status</option>
                        <option value="Pending" <?= $data['status'] == 'Menunggu' ? 'selected' : '' ?>>Menunggu</option>
                        <option value="Confirmed" <?= $data['status'] == 'Disetujui' ? 'selected' : '' ?>>Disetujui</option>
                        <option value="Canceled" <?= $data['status'] == 'Ditolak' ? 'selected' : '' ?>>Ditolak</option>
                    </select><br><br>
                    
                    <label for="id">ID User</label>
                    <input type="text" name="id" value="<?= $data['id']; ?>" disabled/><br>
                    <label for="tanggal">Tanggal Konsultasi</label>
                    <input type="date" name="tanggal" value="<?php echo $data['tanggal']; ?>" disabled />
                    <label for="jam">Jam Konsultasi</label>
                    <input type="time" name="jam" value="<?php echo $data['jam']; ?>" disabled />
                    <button type="submit" name="edit">Masuk</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

