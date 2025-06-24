<?php
    include "../../koneksi.php";
    session_start();

    if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
        echo "Akses ditolak";
        exit;
    }
    
    if(isset($_POST['submit'])){
        $username = $_SESSION['username'];
        $query = mysqli_query($conn, "SELECT id FROM users WHERE username = '$username'");
        $data = mysqli_fetch_assoc($query);
        $user_id = $data['id'];
        $dokter_id = $_POST['dokter_id'];
        $tanggal = $_POST['tanggal'];
        $jam = $_POST['jam'];
        $status = 'Menunggu';
        
        $sql = "INSERT INTO booking_jam (user_id, dokter_id, tanggal, jam, status) VALUES ('$user_id', '$dokter_id', '$tanggal', '$jam', '$status')";

        if ($conn->query($sql) === TRUE) {
            header("Location: list_booking.php");
        }else{
            echo "Error: ". $conn->error;
        }
    }


    $conn->close();
?>