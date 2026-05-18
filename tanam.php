<?php
include 'koneksi.php';

$query = mysqli_query($conn,"
SELECT tanam.*, lahan.nama_lahan
FROM tanam
JOIN lahan ON tanam.id_lahan = lahan.id
");

$total = mysqli_num_rows($query);
?>

<div class="container-fluid">

<div class="d-flex justify-content-between align-items-center mb-4">

<h2 class="font-weight-bold text-gray-800">
<i class="fas fa-seedling text-success"></i> Data Tanam
</h2>

<a href="?page=tanam_tambah" class="btn btn-success shadow">
<i class="fas fa-plus"></i> Tambah Tanam
</a>

</div>

<div class="row mb-4">
<div class="col-md-4">

<div class="card border-left-success shadow h-100 py-2">

<div class="card-body">

<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
Total Tanam
</div>

<div class="h5 mb-0 font-weight-bold text-gray-800">
<?= $total ?>
</div>

</div>
</div>
</div>
</div>

<div class="card shadow-lg border-0">

<div class="card-header bg-success text-white">
<h6 class="m-0 font-weight-bold">Daftar Tanam</h6>
</div>

<div class="card-body p-0">

<div class="table-responsive">

<table class="table table-hover mb-0">

<thead class="bg-light">

<tr>
<th>No</th>
<th>Nama Lahan</th>
<th>Tanggal Tanam</th>
<th>Jenis Bibit</th>
<th>Jumlah Bibit</th>
<th>Modal</th> <!-- TAMBAHAN -->
<th width="180">Aksi</th>
</tr>

</thead>

<tbody>

<?php
$no = 1;
while($data = mysqli_fetch_array($query)){
?>

<tr>

<td><?= $no++ ?></td>

<td class="font-weight-bold">
<?= $data['nama_lahan'] ?>
</td>

<td><?= $data['tanggal_tanam'] ?></td>

<td><?= $data['jenis_bibit'] ?></td>

<td>
<?= $data['jumlah_bibit'] ?> Kg
</td>

<td class="text-success font-weight-bold">
Rp <?= number_format($data['modal'] ?? 0) ?>
</td>

<td>

<a href="?page=tanam_edit&id=<?= $data['id'] ?>"
class="btn btn-info btn-sm shadow-sm">
<i class="fas fa-edit"></i>
</a>

<a href="?page=tanam_hapus&id=<?= $data['id'] ?>"
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