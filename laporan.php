<?php
include "koneksi.php";

/* ambil semua lahan */
$query = mysqli_query($conn,"SELECT * FROM lahan");
?>

<div class="container-fluid">

<h2 class="mb-4 font-weight-bold text-gray-800">
<i class="fas fa-chart-line text-success"></i> Laporan Per Lahan
</h2>

<?php while($data=mysqli_fetch_array($query)){ 

$id_lahan = $data['id'];

/* total panen */
$panen = mysqli_fetch_array(mysqli_query($conn,"
SELECT SUM(panen.hasil_panen) as total_panen
FROM panen
JOIN tanam ON panen.id_tanam = tanam.id
WHERE tanam.id_lahan='$id_lahan'
"));
$total_panen = $panen['total_panen'] ?? 0;

/* total penjualan */
$jual = mysqli_fetch_array(mysqli_query($conn,"
SELECT SUM(penjualan.total_harga) as total_jual
FROM penjualan
JOIN panen ON penjualan.id_panen = panen.id
JOIN tanam ON panen.id_tanam = tanam.id
WHERE tanam.id_lahan='$id_lahan'
"));
$total_jual = $jual['total_jual'] ?? 0;

/* total pengeluaran */
$keluar = mysqli_fetch_array(mysqli_query($conn,"
SELECT SUM(pengeluaran.jumlah) as total_keluar
FROM pengeluaran
JOIN tanam ON pengeluaran.id_tanam = tanam.id
WHERE tanam.id_lahan='$id_lahan'
"));
$total_keluar = $keluar['total_keluar'] ?? 0;

/* total modal */
$modal = mysqli_fetch_array(mysqli_query($conn,"
SELECT SUM(modal) as total_modal
FROM tanam
WHERE id_lahan='$id_lahan'
"));
$total_modal = $modal['total_modal'] ?? 0;

/* hitung untung rugi */
$hasil = $total_jual - ($total_keluar + $total_modal);
?>

<div class="card shadow mb-4">

<div class="card-header bg-success text-white">
<h6 class="m-0 font-weight-bold">
<?= $data['nama_lahan'] ?>
</h6>
</div>

<div class="card-body">

<p><b>Total Panen :</b> <?= $total_panen ?> Kg</p>

<p><b>Total Penjualan :</b> Rp <?= number_format($total_jual) ?></p>

<p><b>Total Modal :</b> Rp <?= number_format($total_modal) ?></p>

<p><b>Total Pengeluaran :</b> Rp <?= number_format($total_keluar) ?></p>

<hr>

<?php if($hasil >= 0){ ?>

<h4 class="text-success">
UNTUNG : Rp <?= number_format($hasil) ?>
</h4>

<?php }else{ ?>

<h4 class="text-danger">
RUGI : Rp <?= number_format($hasil) ?>
</h4>

<?php } ?>

</div>

</div>

<?php } ?>

</div>