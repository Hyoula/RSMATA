<?php
    include "../../koneksi.php";
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $role = "user";
        if ($id == "") {
            $sql = "INSERT INTO users (name, username, password, role) VALUES ('$name', '$username', '$password', '$role')";
        }else{
            if ($_POST['password'] != "") {
                $sql = "UPDATE users SET name='$name', username='$username', password='$password', role='$role' WHERE id=$id";
            } else {
                $sql = "UPDATE users SET name='$name', username='$username', role='$role' WHERE id=$id";
            }
        }

        if ($conn->query($sql) === TRUE) {
            header("Location: data_user.php");
        }else{
            echo "Error: ". $conn->error;
        }
    }

    if (isset($_GET['hapus'])) {
        $id = $_GET['hapus'];
        $sql = "DELETE FROM users WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            header("Location: data_user.php");
        }else{
            echo "Error: ". $conn->error;
        }
    }

    $conn->close();
?>