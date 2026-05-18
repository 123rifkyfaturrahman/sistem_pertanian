<?php
include "koneksi.php";

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM pengeluaran WHERE id='$id'");

echo "<script>
alert('Data berhasil dihapus');
location='index.php?page=pengeluaran';
</script>";
?>