<?php
    include "../../koneksi.php";
    session_start();

    if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'dokter') {
        echo "Akses ditolak, halaman ini hanya bisa dimuat oleh dokter";
        exit;
    }
    if(isset($_POST['submit'])){
        $username = $_SESSION['username'];
        $query = mysqli_query($conn, "SELECT id FROM users WHERE username = '$username'");
        $data = mysqli_fetch_assoc($query);
        $dokter_id = $data['id'];
        $id = $_POST['id'];
        $hari = $_POST['hari'];
        $jam_mulai = $_POST['jam_mulai'];
        $jam_selesai = $_POST['jam_selesai'];
        if ($id == "") {
            $sql = "INSERT INTO jadwal_dokter (dokter_id, hari, jam_mulai, jam_selesai) VALUES ('$dokter_id', '$hari', '$jam_mulai', '$jam_selesai')";
        }else{
            $sql = "UPDATE jadwal_dokter SET hari='$hari', jam_mulai='$jam_mulai', jam_selesai='$jam_selesai' WHERE id=$id";
        }

        if ($conn->query($sql) === TRUE) {
            header("Location: jam_kerja.php");
        }else{
            echo "Error: ". $conn->error;
        }
    }

    if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $status = $_POST['status'];

        $sql = "UPDATE booking_jam SET status='$status' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            header("Location: jadwal_konsul.php");
        } else {
            echo "Gagal mengupdate data: " . $conn->error;
        }
    }

    if (isset($_GET['hapus'])) {
        $id = $_GET['hapus'];
        $sql = "DELETE FROM jadwal_dokter WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            header("Location: jam_kerja.php");
        }else{
            echo "Error: ". $conn->error;
        }
    }

    $conn->close();
?>