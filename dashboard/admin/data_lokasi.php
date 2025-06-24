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
        <a href="../../index.php" style="text-decoration: none;"><h3>Eyes|Hospital</h3></a><hr><br>
                <a href="dash.php"><dd>Dashboard</dd></a>
                <a href="data_dokter.php"><dd>Data Dokter</dd></a>
                <a href="data_user.php"><dd>Data User</dd></a>
                <a href="data_lokasi.php"><dd style="background-color: rgb(255, 255, 255);color: red">Data Lokasi</dd></a>
                <a href="../../logout.php" onClick="return confirm('Yakin ingin keluar?')"><dd>Logout</dd></a>
        </div>

        <div class="kotak">
            <h2>Data Lokasi Layanan Mata</h2>
            <div class="kotak-box">
                <h4>Tambah Data Lokasi</h4><hr>
                <form id="map-form">
                    <input type="text" id="clinic-name" placeholder="Nama Klinik" required>
                    <input type="number" id="clinic-lat" placeholder="Latitude" step="any" required>
                    <input type="number" id="clinic-lng" placeholder="Longitude" step="any" required>
                    <label for="jam_mulai">Pilih Jenis : </label>
                    <select id="clinic-type">
                        <option value="klinik">Klinik Mata</option>
                        <option value="rs">Rumah Sakit</option>
                    </select>
                    <button type="submit" style="margin-top: 20px;">Tambah Titik</button>
                </form>
            </div>

            <div class="kotak-box">
            <h4>Tabel Data User</h4><hr>
                <table class="tabel-dokter" id="clinic-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Klinik</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Jenis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data akan dimasukkan via JS -->
                    </tbody>
                </table>
            </div>

            <div class="kotak-box">
                <h2>Data Klinik (LocalStorage)</h2><hr>
                <pre id="clinic-json"></pre>
            </div>
        </div>
    </div>
    
    <script type="module" src="../../json/maps.js"></script>
</body>
</html>

