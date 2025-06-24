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
    <link rel="stylesheet" href="assets/css/home.css">
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
            <li><a href="maps.php">LAYANAN MATA LAINNYA</a></li>
            <li><a href="tentang.php">TENTANG</a></li>
            <li><a href="index.php" class="selectednav">BERANDA</a></li>
        </ul>
    </nav>
    <div class="gambar">
        <div class="pink" align="center">
            <hr class="pendek1">
            <div class="pik">DAPATKAN<br>LAYANAN<br>TERBAIK<br>DISINI</div>
            <hr class="pendek2">
        </div>
    </div>
    
    <div class="ruang" align="center">
        <table>
            <tr>
                <td class="muda">
                    <img src="assets/gambar/jamm.png">
                    <h3>Pelayanan 24 Jam</h3>
                    <p>Pelayanan 7 hari dalam seminggu dengan dokter umum dan perawatan yang profesional didukung oleh dokter spesialis yang dapat dihubungi setiap waktu</p>
                </td>
                <td class="tua">
                    <img src="assets/gambar/reaksi.png">
                    <h3>Laboratorium</h3>
                    <p>Dilengkapi dengann peralatan mutakhir dan didukung oleh staf yang terdiri dari para dokter dan analis yang professional dan sangat berpengalaman</p>
                </td>
                <td class="muda">
                    <img src="assets/gambar/dokter.png">
                    <h3>Tenaga Medis</h3>
                    <p>Kami didukung oleh tenaga medis yang terlatih dan memiliki sertifikat penanggulangan pasien Gawat Darurat(PPGD), Advance Cardiac Life Support(ACLS)</p>
                </td>
                <td class="tua">
                    <img src="assets/gambar/iku.png">
                    <h3>Unit UGD</h3>
                    <p>Instalasi gawat darurat Hyoula's Hospital melayani kegawatdaruratan medik baik kasus trauma maupun non trauma, termasuk resusitasi secara optimal dan profesional</p>
                </td>
            </tr>
        </table>
    </div>
    <div class="fasilitas">
        <h2>FASILITAS KAMI</h2>
        <center>
        <table>
            <tr>
                <td>
                    <img src="assets/gambar/dubai-rs-2.jpg">
                    <span>Ruang Rawat Inap</span><hr>
                    Menyediakan fasilitas ruang rawat inap dengan se-maksimal mungkin
                </td>
                <td>
                    <img src="assets/gambar/timthumb.jfif">
                    <span>Ruang Operasi</span><hr>
                    Menyediakan ruang operasi yang steril dan fasilitas yang memadai
                </td>
                <td>
                    <img src="assets/gambar/doctors-A_E_2626626b.jpg">
                    <span>Instalasi Gawat Darurat</span><hr>
                    Siap untuk instalasi gawat darurat kapanpun dibutuhkan
                </td>
                <td>
                    <img src="assets/gambar/gleneagles_02.jpg">
                    <span>Dana Sukarela</span><hr>
                    Mempersiapkan ruang bagi sukerela yang ingin membantu pasien
                </td>
                <td>
                    <img src="assets/gambar/ArjoHuntleigh-Products-VTE-IPC-Garments-Flowtron-ACS800-Pump-Plus-Tri-Pulse-Nurse-Applying-Garment-1-1.jpg">
                    <span>Medical Check Up</span><hr>
                    Rutin memberikan pelayanan check up bagi pasien
                </td>
                <td>
                    <img src="assets/gambar/google_place_photo.jfif">
                    <span>Holl's Coffee Shop</span><hr>
                    Menyediakan ruang coffe bagi penunggu
                </td>
            </tr>
        </table>
        </center>
    </div>
    <div class="ruang1" align="center"></div>
    
    <div class="peta">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d279.3466508081003!2d124.84722519462876!3d1.4629931858200533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x328774c4c22eaf3b%3A0xbc4ec740d18ec7a2!2sRumah%20Sakit%20Mata%20Provinsi%20Sulawesi%20Utara!5e0!3m2!1sid!2sid!4v1750713174651!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="footer">
        <h2>RUMAH SAKIT MATA PROVINSI SULUT</h2>
        Senin - Minggu 24/7 <br>
        Jl. WZ Yohanes No.1, Wanea, Kec. Wanea, Kota Manado, Sulawesi Utara 95117 <br>
        Telepon : +62 82142828535  <br>
        Email : mmargarethnh355@gmail.com
    </div>
</body>
</html>