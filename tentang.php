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
    <link rel="stylesheet" href="assets/css/tentang.css">
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
            <li><a href="tentang.php" class="selectednav">TENTANG</a></li>
            <li><a href="index.php">BERANDA</a></li>
        </ul>
    </nav>
    
    <div class="ruang">
        <h1>TENTANG RUMAH SAKIT KAMI</h1>
        <table>
            <tr>
                <td>
                    <h2>VISI</h2>
                    <p>Pelayanan 7 hari dalam seminggu dengan dokter umum dan perawatan yang profesional didukung oleh dokter spesialis yang dapat dihubungi setiap waktu</p>
                    <h2>MISI</h2>
                    <ol>
                        <li>Menyelenggarakan pelayanan kesehatan mata secara paripurna, efektif, efisien dan profesional</li>
                        <li>Meningkatkan kualitas SDM yang kompeten dan bermartabat</li>
                        <li>Mengutamakan keselamatan dan kepuasan pelanggan</li>
                        <li>Menjalankan kemitraan dalam bidang pelayanan, pendidikan dan pelatihan</li>
                        <li>Meningkatkan gerakan masyarakat peduli kesehatan mata</li>
                        <li>Meningkatkan pemerataan dan keterjangkauan pelayanan kesehatan mata masyarakat</li>
                    </ol>
                </td>
                <td style="width: 50%">
                    <iframe width="660" height="415"
                    src="https://www.youtube.com/embed/PeFNbGWRLI4?si=HoiVKbxMs6T5f5vW"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                    </iframe>
                </td>
            </tr>
        </table>
    </div>
    <div class="ruang1">
        <h1>MOTTO KAMI</h1>
        <h2>"KAMI PEDULI MATA ANDA"</h2>
    </div>
    <div class="ruang2">
        <h1>PELAYANAN YANG DISEDIAKAN</h1>
        <h2>1. Pemeriksaan Mata Umum</h2>
        <p>Layanan ini mencakup pemeriksaan dasar dan menyeluruh terhadap kondisi kesehatan mata, termasuk pengukuran ketajaman visual, pemeriksaan refraksi (rabun jauh, rabun dekat, dan astigmatisme), serta skrining untuk mendeteksi potensi penyakit mata secara dini. Pemeriksaan dilakukan dengan alat optometri modern dan hasilnya akan dianalisis langsung oleh dokter spesialis mata.</p>

        <h2>2. Operasi Katarak</h2>
        <p>Katarak adalah penyebab utama kebutaan yang dapat diatasi dengan tindakan operasi. Eyes Hospital menggunakan teknologi fakoemulsifikasi — prosedur bedah minimal invasif yang memecah lensa mata yang keruh dan menggantinya dengan lensa intraokular (IOL) yang jernih. Operasi berlangsung cepat, aman, dan umumnya tanpa rawat inap.</p>

        <h2>3. LASIK (Laser Vision Correction)</h2>
        <p>LASIK adalah prosedur koreksi penglihatan menggunakan teknologi laser untuk mengubah bentuk kornea, sehingga penglihatan menjadi lebih tajam tanpa perlu memakai kacamata atau lensa kontak. Cocok bagi pasien dengan miopia (rabun jauh), hipermetropia (rabun dekat), dan astigmatisme (silinder). Evaluasi pra-LASIK dilakukan untuk memastikan kelayakan prosedur bagi tiap pasien.</p>

        <h2>4. Deteksi dan Penanganan Glaukoma</h2>
        <p>Glaukoma adalah kondisi kerusakan saraf optik akibat peningkatan tekanan intraokular. Sering kali tidak bergejala pada tahap awal, sehingga penting dilakukan pemeriksaan rutin. Kami menyediakan pemantauan tekanan bola mata, tes lapang pandang, serta terapi medis dan bedah untuk mencegah kehilangan penglihatan permanen akibat glaukoma.</p>

        <h2>5. Operasi Retina</h2>
        <p>Retina merupakan jaringan sensitif cahaya di bagian belakang mata. Gangguan retina seperti ablasi retina, retinopati diabetik, dan degenerasi makula dapat menyebabkan kebutaan permanen jika tidak ditangani dengan cepat. Eyes Hospital memiliki tim subspesialis retina dan fasilitas bedah vitreoretinal yang lengkap untuk penanganan kondisi ini.</p>

        <h2>6. Pelayanan Anak & Strabismus (Mata Juling)</h2>
        <p>Kami menyediakan layanan khusus untuk anak-anak, termasuk deteksi dini gangguan penglihatan, penanganan ambliopia (mata malas), dan strabismus (mata juling). Penanganan dapat dilakukan melalui terapi mata, penggunaan kacamata khusus, atau tindakan pembedahan. Lingkungan klinik kami dirancang ramah anak agar pengalaman mereka tetap menyenangkan.</p>

        <h2>7. Optik & Pembuatan Kacamata</h2>
        <p>Eyes Hospital juga menyediakan layanan optik untuk pembuatan kacamata sesuai resep dokter. Kami memiliki berbagai pilihan bingkai dan lensa berkualitas tinggi, baik untuk keperluan koreksi penglihatan, perlindungan dari sinar UV, maupun kacamata khusus untuk aktivitas digital. Tim optisi kami siap membantu Anda memilih kacamata yang tepat.</p>
    </div>
    <div class="footer">
        <h2>RUMAH SAKIT MATA PROVINSI SULUT</h2>
        Senin - Minggu 24/7 <br>
        Jl. WZ Yohanes No.1, Wanea, Kec. Wanea, Kota Manado, Sulawesi Utara 95117<br>
        Telepon : +62 82142828535  <br>
        Email : mmargarethnh355@gmail.com
    </div>
</body>
</html>