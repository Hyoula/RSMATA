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
                <a href="dash.php"><dd style="background-color: rgb(255, 255, 255);color: red;">Dashboard</dd></a>
                <a href="jadwal_dokter.php"><dd>Jadwal Dokter</dd></a>
                <a href="list_booking.php"><dd>List Booking</dd></a>
                <a href="../../logout.php" onClick="return confirm('Yakin ingin keluar?')"><dd>Logout</dd></a>
        </div>
        
        <div class="kotak">
            <?php
                $result = $conn->query("SELECT * FROM users");
            ?>
            <h1>Selamat datang, <?php echo $nama; ?>!</h1>
            <h4>Anda adalah <strong><?php echo $_SESSION['role'];?></strong> yang kami cintai di Eyes Hospital ini :)</h4>
            
            <img src="../../assets/gambar/inii.jpg" width="99%">
        </div>
    </div>
</body>
</html>

