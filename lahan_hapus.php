<?php
include 'koneksi.php';

$id = $_GET['id'];

try {

    mysqli_query($conn, "DELETE FROM lahan WHERE id='$id'");

    echo "<script>
    alert('Data lahan berhasil dihapus');
    location='index.php?page=lahan';
    </script>";

} catch (mysqli_sql_exception $e) {

    echo "<script>
    alert('Data tidak bisa dihapus karena masih digunakan (tanam/panen)');
    location='index.php?page=lahan';
    </script>";

}
?>