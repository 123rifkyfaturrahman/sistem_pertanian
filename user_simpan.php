<?php

include 'koneksi.php';

if($_SESSION['level'] != 'admin'){
    die("Akses ditolak!");
}

$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

if(empty($username) || empty($password)){
    echo "<script>alert('Data tidak boleh kosong');history.back();</script>";
    exit;
}

$password = password_hash($password, PASSWORD_DEFAULT);

mysqli_query($conn, "INSERT INTO user (username,password,level) 
VALUES ('$username','$password','$level')");

header("location:index.php?page=user");
?>