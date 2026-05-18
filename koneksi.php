
<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}


$servername = "localhost";
$username = "root"; // Default xampp
$password = "";
$database = "sistem_pertanian"; // Nama database yang sudah dibuat

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);

// Mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>
