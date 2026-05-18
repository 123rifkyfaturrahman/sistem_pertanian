<?php
include "koneksi.php";

$id = $_GET['id'];

// hapus penjualan
mysqli_query($conn,"
DELETE penjualan FROM penjualan
JOIN panen ON penjualan.id_panen = panen.id
WHERE panen.id_tanam='$id'
");

// hapus panen
mysqli_query($conn,"DELETE FROM panen WHERE id_tanam='$id'");

// hapus pengeluaran
mysqli_query($conn,"DELETE FROM pengeluaran WHERE id_tanam='$id'");

// hapus tanam
mysqli_query($conn,"DELETE FROM tanam WHERE id='$id'");

echo "<script>
alert('Data berhasil dihapus dari database');
location='index.php?page=tanam';
</script>";
?>