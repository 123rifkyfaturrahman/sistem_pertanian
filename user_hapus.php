<?php

include 'koneksi.php';

if($_SESSION['level'] != 'admin'){
    die("Akses ditolak!");
}

$id = $_GET['id'];

// ❗ tidak boleh hapus diri sendiri
if($id == $_SESSION['id_user']){
    echo "<script>alert('Tidak bisa hapus akun sendiri!');history.back();</script>";
    exit;
}

mysqli_query($conn, "DELETE FROM user WHERE id='$id'");

header("location:index.php?page=user");
?>