<?php
include '../../koneksi.php';
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'dokter') {
    echo "Akses ditolak.";
    exit;
}

if (isset($_GET['id']) && isset($_GET['aksi'])) {
    $id = $_GET['id'];
    $aksi = $_GET['aksi'];

    if ($aksi == 'setuju') {
        $status = 'Disetujui';
    } elseif ($aksi == 'tolak') {
        $status = 'Ditolak';
    } else {
        echo "Aksi tidak valid.";
        exit;
    }

    $update = mysqli_query($conn, "UPDATE booking_jam SET status = '$status' WHERE id = '$id'");

    if ($update) {
        header("Location: jadwal_konsul.php?status=berhasil");
    } else {
        echo "Gagal memperbarui data.";
    }
} else {
    echo "Parameter tidak lengkap.";
}
?>
