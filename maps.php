<?php
session_start();
$role = isset($_SESSION['role']) ? $_SESSION['role'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eyes Hospital</title>
    <link rel="stylesheet" href="assets/css/peta.css">
</head>
<body>
	<header>
        <a href="#" ><b>Rumah Sakit Mata</b></a>
        <h5>Provinsi Sulawesi Utara</h5>
    </header>
    <nav>
        <ul>
            <?php if($role): ?>
                <?php if($role === 'admin'): ?>
                    <li class="login"><a href="dashboard/admin/dash.php">DASHBOARD</a></li>
                <?php elseif($role === 'dokter'): ?>
                    <li class="login"><a href="dashboard/dokter/dash.php">DASHBOARD</a></li>
                <?php else: ?>
                    <li class="login"><a href="dashboard/user/dash.php">DASHBOARD</a></li>
                <?php endif; ?>
            <?php else: ?>
                <li class="login"><a href="daftar.php">LOGIN</a></li>
            <?php endif; ?>
            <li><a href="maps.php" class="selectednav">LAYANAN MATA LAINNYA</a></li>
            <li><a href="tentang.php">TENTANG</a></li>
            <li><a href="index.php">BERANDA</a></li>
        </ul>
    </nav>
    <div class="ruang">
        <h1>PETA PERSEBARAN LOKASI LAYANAN MATA DI SULAWESI UTARA</h1>
        <center>
        <div id="map_canvas" class="map-canvas"></div>
        </center>
    </div>

    <script type="module" src="json/maps.js"></script>

    <script
        async
        defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUMIxbtNsh3j2WOX09iVvFoTjmuCPxBow&libraries=marker&callback=initMap">
    </script>
    
    <div class="footer">
        <h2>RUMAH SAKIT MATA PROVINSI SULUT</h2>
        Senin - Minggu 24/7 <br>
        Jl. WZ Yohanes No.1, Wanea, Kec. Wanea, Kota Manado, Sulawesi Utara 95117<br>
        Telepon : +62 82142828535  <br>
        Email : mmargarethnh355@gmail.com
    </div>
</body>
</html>