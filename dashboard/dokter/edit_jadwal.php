<?php
include '../../koneksi.php';
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'dokter') {
    echo "Akses ditolak, Halaman ini hanya untuk dokter";
    exit;
}
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM jadwal_dokter WHERE id=$id");
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
                <a href="jam_kerja.php"><dd style="background-color: rgb(255, 255, 255);color: red;">Jadwal Kerja</dd></a>
                <a href="jadwal_konsul.php"><dd>Jadwal Konsultasi</dd></a>
                <a href="../../logout.php" onClick="return confirm('Yakin ingin keluar?')"><dd>Logout</dd></a>
        </div>
        
        <div class="kotak">
            <h2>Booking List</h2>
            <div class="kotak-box">
                <h4>Buat Jadwal Kerja</h4><hr>
                <form action="tambah_jamKerja.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                    
                    <label for="status">Pilih Hari : </label>
                    <select name="hari" required>
                        <option value="">Pilih Hari</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                    </select><br><br>
                    <label for="jam_mulai">Jam Mulai</label>
                    <input type="time" name="jam_mulai" value="<?php echo $data['jam_mulai']; ?>" required />
                    <label for="jam_selesai">Jam Selesai</label>
                    <input type="time" name="jam_selesai" value="<?php echo $data['jam_selesai']; ?>" required />
                    <button type="submit" name="submit">Masuk</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

