<?php
include "koneksi.php";

$tanam = mysqli_query($conn,"
SELECT tanam.id, tanam.jenis_bibit, lahan.nama_lahan
FROM tanam
JOIN lahan ON tanam.id_lahan = lahan.id
");
if(isset($_POST['simpan'])){

$id_tanam = $_POST['id_tanam'];
$tanggal = $_POST['tanggal_panen'];
$hasil = $_POST['hasil_panen'];

mysqli_query($conn,"
INSERT INTO panen (id_tanam, tanggal_panen, hasil_panen)
VALUES ('$id_tanam','$tanggal','$hasil')
");

echo "<script>
alert('Data panen berhasil ditambahkan');
location='index.php?page=panen';
</script>";

}
?>

<div class="container-fluid">

<!-- HEADER -->
<div class="d-flex justify-content-between align-items-center mb-4">

<h2 class="font-weight-bold text-gray-800">
<i class="fas fa-tractor text-success"></i> Tambah Data Panen
</h2>

<a href="index.php?page=panen" class="btn btn-secondary shadow">
<i class="fas fa-arrow-left"></i> Kembali
</a>

</div>

<div class="row justify-content-center">

<div class="col-lg-7">

<div class="card shadow-lg border-0">

<div class="card-header bg-success text-white">
<h6 class="m-0 font-weight-bold">
<i class="fas fa-plus-circle"></i> Form Input Panen
</h6>
</div>

<div class="card-body">

<form method="POST">

<!-- TANAM -->
<div class="form-group">

<label class="font-weight-bold">
<i class="fas fa-seedling text-success"></i> Pilih Tanam
</label>

<select name="id_tanam" class="form-control" required>

<option value="">-- Pilih Tanam --</option>

<?php while($t=mysqli_fetch_array($tanam)){ ?>

<option value="<?= $t['id'] ?>">

<?= $t['nama_lahan'] ?> - <?= $t['jenis_bibit'] ?>

</option>

<?php } ?>

</select>

</div>

<!-- TANGGAL PANEN -->
<div class="form-group">

<label class="font-weight-bold">
<i class="fas fa-calendar text-primary"></i> Tanggal Panen
</label>

<input type="date" name="tanggal_panen" 
class="form-control" required>

</div>

<!-- HASIL PANEN -->
<div class="form-group">

<label class="font-weight-bold">
<i class="fas fa-weight text-warning"></i> Hasil Panen
</label>

<input type="text" name="hasil_panen"
class="form-control"
placeholder="Contoh: 2 Ton / 500 Kg"
required>

</div>

<hr>

<!-- BUTTON -->
<div class="text-right">

<button class="btn btn-success shadow" name="simpan">

<i class="fas fa-save"></i> Simpan Data

</button>

<a href="index.php?page=panen" 
class="btn btn-secondary">

Batal

</a>

</div>

</form>

</div>

</div>

</div>

<!-- INFO CARD -->

<div class="col-lg-4">

<div class="card shadow border-left-success">

<div class="card-body">

<h6 class="font-weight-bold text-success">
<i class="fas fa-info-circle"></i> Informasi
</h6>

<p class="small text-gray-600">

Gunakan form ini untuk menambahkan data panen.

Data yang perlu diisi:

<br>• Pilih data tanam
<br>• Tanggal panen
<br>• Jumlah hasil panen

</p>

</div>

</div>

</div>

</div>

</div>