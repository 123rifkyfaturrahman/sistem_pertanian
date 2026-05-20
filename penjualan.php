<?php
include 'koneksi.php';

$query = mysqli_query($conn,"
SELECT penjualan.*, lahan.nama_lahan, tanam.jenis_bibit
FROM penjualan
JOIN panen ON penjualan.id_panen = panen.id
JOIN tanam ON panen.id_tanam = tanam.id
JOIN lahan ON tanam.id_lahan = lahan.id
");

$total = mysqli_num_rows($query);
?>

<div class="container-fluid">

<!-- HEADER -->
<div class="d-flex justify-content-between align-items-center mb-4">

<h2 class="font-weight-bold text-gray-800">
<i class="fas fa-money-bill-wave text-success"></i> Data Penjualan
</h2>

<a href="?page=penjualan_tambah" class="btn btn-success shadow-sm">
<i class="fas fa-plus"></i> Tambah Penjualan
</a>

</div>

<!-- STAT CARD -->

<div class="row mb-4">

<div class="col-md-4">

<div class="card border-left-success shadow h-100 py-2">

<div class="card-body">

<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
Total Transaksi
</div>

<div class="h5 mb-0 font-weight-bold text-gray-800">
<?= $total ?>
</div>

</div>

</div>

</div>

</div>

<!-- TABEL -->

<div class="card shadow border-0">

<div class="card-header bg-success text-white">
<h6 class="m-0 font-weight-bold">Daftar Penjualan</h6>
</div>

<div class="card-body p-0">

<div class="table-responsive">

<table class="table table-hover mb-0">

<thead class="bg-light">

<tr>
<th>No</th>
<th>Lahan</th>
<th>Bibit</th>
<th>Jumlah (Kg)</th>
<th>Harga / Kg</th>
<th>Total</th>
<th width="160">Aksi</th>
</tr>

</thead>

<tbody>

<?php 
$no=1;
while($data=mysqli_fetch_array($query)){
?>

<tr>

<td><?= $no++ ?></td>

<td class="font-weight-bold">
<?= $data['nama_lahan'] ?>
</td>

<td>
<span class="badge badge-success">
<?= $data['jenis_bibit'] ?>
</span>
</td>



<td><?= $data['jumlah_kg'] ?> Kg</td>

<td>Rp <?= number_format($data['harga_perkg']) ?></td>

<td class="font-weight-bold text-success">
Rp <?= number_format($data['total_harga']) ?>
</td>

<td>

<a href="?page=penjualan_edit&id=<?= $data['id'] ?>" 
class="btn btn-info btn-sm shadow-sm">

<i class="fas fa-edit"></i>

</a>

<a href="?page=penjualan_hapus&id=<?= $data['id'] ?>" 
class="btn btn-danger btn-sm shadow-sm"
onclick="return confirm('Hapus data ini?')">

<i class="fas fa-trash"></i>

</a>

</td>

</tr>

<?php } ?>  

</tbody>

</table>

</div>

</div>

</div>

</div>