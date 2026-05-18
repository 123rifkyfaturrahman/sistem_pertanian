<?php
include 'koneksi.php';

$query = mysqli_query($conn,"
SELECT 
    pengeluaran.*, 
    tanam.tanggal_tanam,
    lahan.nama_lahan
FROM pengeluaran
JOIN tanam ON pengeluaran.id_tanam = tanam.id
JOIN lahan ON tanam.id_lahan = lahan.id
");

$total = mysqli_num_rows($query);
?>

<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">

<h2 class="font-weight-bold">
<i class="fas fa-wallet text-danger"></i> Data Pengeluaran
</h2>

<a href="?page=pengeluaran_tambah" class="btn btn-danger">
<i class="fas fa-plus"></i> Tambah Pengeluaran
</a>

</div>

<div class="card shadow">

<div class="card-header bg-danger text-white">
Daftar Pengeluaran
</div>

<div class="card-body p-0">

<table class="table table-hover">

<thead class="bg-light">

<tr>
<th>No</th>
<th>Lahan</th>
<th>Keterangan</th>
<th>Jumlah</th>
<th>Aksi</th>
</tr>

</thead>

<tbody>

<?php
$no=1;
while($data=mysqli_fetch_array($query)){
?>

<tr>

<td><?= $no++ ?></td>

<td><?= $data['nama_lahan'] ?></td>


<td><?= $data['keterangan'] ?></td>

<td class="text-danger">
Rp <?= number_format($data['jumlah']) ?>
</td>

<td>

<a href="?page=pengeluaran_edit&id=<?= $data['id'] ?>" class="btn btn-info btn-sm">
<i class="fas fa-edit"></i>
</a>

<a href="?page=pengeluaran_hapus&id=<?= $data['id'] ?>" class="btn btn-danger btn-sm"
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