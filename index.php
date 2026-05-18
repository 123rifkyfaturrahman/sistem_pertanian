<?php
session_start();
include "koneksi.php";

if(!isset($_SESSION['id_user'])){
    header("location:login.php");
    exit;
}

// BARU: Ambil level/role user dari session (pastikan variabel session ini sesuai dengan yang kamu buat saat login)
// Jika di database/proses loginmu namanya lain (misal 'role'), ganti ['level'] menjadi ['role']
$level_user = isset($_SESSION['level']) ? $_SESSION['level'] : 'user'; 
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Sistem Pertanian</title>

<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
<link href="css/sb-admin-2.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

</head>

<body id="page-top">

<div id="wrapper">

<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion">

<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">

<div class="sidebar-brand-icon">

</div>

<div class="sidebar-brand-text mx-2">
Sistem Pertanian
</div>

</a>

<hr class="sidebar-divider my-0">

<li class="nav-item active">
<a class="nav-link" href="index.php?page=home">

<i class="fas fa-fw fa-tachometer-alt"></i>
<span>Dashboard</span>

</a>
</li>

<hr class="sidebar-divider">

<div class="sidebar-heading">
Menu Sistem
</div>

<li class="nav-item">
<a class="nav-link" href="index.php?page=lahan">

<i class="fas fa-map"></i>
<span>Lahan</span>

</a>
</li>

<li class="nav-item">
<a class="nav-link" href="index.php?page=tanam">

<i class="fas fa-seedling"></i>
<span>Tanam</span>

</a>
</li>

<li class="nav-item">
<a class="nav-link" href="index.php?page=panen">

<i class="fas fa-tractor"></i>
<span>Panen</span>

</a>
</li>

<li class="nav-item">
<a class="nav-link" href="index.php?page=pengeluaran">

<i class="fas fa-money-bill-wave"></i>
<span>Pengeluaran</span>

</a>
</li>

<li class="nav-item">
<a class="nav-link" href="index.php?page=penjualan">

<i class="fas fa-shopping-cart"></i>
<span>Penjualan</span>

</a>
</li>

<?php if ($level_user === 'admin'): ?>
<li class="nav-item">
<a class="nav-link" href="index.php?page=laporan">

<i class="fas fa-chart-line"></i>
<span>Laporan</span>

</a>
</li>

<li class="nav-item">
<a class="nav-link" href="index.php?page=user">

<i class="fas fa-users"></i>
<span>User</span>

</a>
</li>
<?php endif; ?>

<hr class="sidebar-divider">

<li class="nav-item">
<a class="nav-link" href="logout.php">

<i class="fas fa-sign-out-alt"></i>
<span>Logout</span>

</a>
</li>

</ul>

<div id="content-wrapper" class="d-flex flex-column">

<div id="content">

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
<i class="fa fa-bars"></i>
</button>

<ul class="navbar-nav ml-auto">

<div class="topbar-divider d-none d-sm-block"></div>

<li class="nav-item dropdown no-arrow">

<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">

<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?></span>

<img class="img-profile rounded-circle" src="img/undraw_profile.svg">

</a>

<div class="dropdown-menu dropdown-menu-right shadow">

<a class="dropdown-item" href="logout.php">

<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
Logout

</a>

</div>

</li>

</ul>

</nav>

<div class="container-fluid">

<div class="row">

<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// BARU: Proteksi URL Backend.
// Jika user biasa mencoba mengetik manual URL: index.php?page=laporan atau index.php?page=user
if (($page == 'laporan' || $page == 'user') && $level_user !== 'admin') {
    // Alihkan langsung ke halaman home/dashboard dengan pesan peringatan
    echo "<script>alert('Akses ditolak! Anda bukan Admin.'); window.location='index.php?page=home';</script>";
    exit;
}

if(file_exists($page.".php")){

include $page.".php";

}else{

include "404.php";

}

?>

</div>

</div>

</div>

<footer class="sticky-footer bg-white">

<div class="container my-auto">

<div class="copyright text-center my-auto">

<span>Copyright &copy; Sistem Manajemen Padi 2026</span>

</div>

</div>

</footer>

</div>

</div>

<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<script src="js/sb-admin-2.min.js"></script>

</body>

</html>