<?php

include 'koneksi.php';

if($_SESSION['level'] != 'admin'){
    die("Akses ditolak!");
}

$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

if(!empty($password)){
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "UPDATE user SET 
    username='$username',
    password='$password',
    level='$level'
    WHERE id='$id'");
}else{
    mysqli_query($conn, "UPDATE user SET 
    username='$username',
    level='$level'
    WHERE id='$id'");
}

header("location:index.php?page=user");
?>