
<?php
include 'koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($conn,"SELECT * FROM tanam WHERE id='$id'");
$data = mysqli_fetch_array($query);

$lahan = mysqli_query($conn,"SELECT * FROM lahan");

if(isset($_POST['submit'])){

$id_lahan = $_POST['id_lahan'];
$tanggal = $_POST['tanggal_tanam'];
$bibit = $_POST['jenis_bibit'];
$jumlah_bibit = $_POST['jumlah_bibit'];
$modal = $_POST['modal'];

mysqli_query($conn,"UPDATE tanam SET
id_lahan='$id_lahan',
tanggal_tanam='$tanggal',
jenis_bibit='$bibit',
jumlah_bibit='$jumlah_bibit',
modal='$modal'
WHERE id='$id'
");

echo "<script>
alert('Data berhasil diubah');
location='index.php?page=tanam';
</script>";

}
?>

<div class="container-fluid">

<!-- HEADER -->
<div class="d-flex justify-content-between align-items-center mb-4">

<h3 class="font-weight-bold text-gray-800">
<i class="fas fa-seedling text-success"></i> Edit Data Tanam
</h3>

<a href="index.php?page=tanam" class="btn btn-secondary shadow-sm">
<i class="fas fa-arrow-left"></i> Kembali
</a>

</div>

<div class="row">

<!-- FORM UTAMA -->
<div class="col-lg-8">

<div class="card shadow-lg border-0">

<div class="card-header bg-gradient-success text-white">
<h6 class="m-0 font-weight-bold">
<i class="fas fa-edit"></i> Form Edit Tanam
</h6>
</div>

<div class="card-body p-4">

<form method="POST">

<!-- LAHAN -->
<div class="form-group">

<label class="font-weight-bold">
<i class="fas fa-map text-success"></i> Pilih Lahan
</label>

<select name="id_lahan" class="form-control form-control-lg" required>

<?php while($l=mysqli_fetch_array($lahan)){ ?>

<option value="<?= $l['id'] ?>"
<?php if($l['id']==$data['id_lahan']) echo "selected"; ?>>

<?= $l['nama_lahan'] ?>

</option>

<?php } ?>

</select>

</div>

<!-- TANGGAL -->
<div class="form-group">

<label class="font-weight-bold">
<i class="fas fa-calendar text-primary"></i> Tanggal Tanam
</label>

<input type="date"
name="tanggal_tanam"
value="<?= $data['tanggal_tanam'] ?>"
class="form-control form-control-lg"
required>

</div>

<!-- BIBIT -->
<div class="form-group">

<label class="font-weight-bold">
<i class="fas fa-leaf text-success"></i> Jenis Bibit
</label>

<input type="text"
name="jenis_bibit"
value="<?= $data['jenis_bibit'] ?>"
class="form-control form-control-lg"
placeholder="Contoh: Bibit IR64"
required>

<br>

<label class="font-weight-bold">
<i class="fas fa-weight text-warning"></i> Jumlah Bibit (Kg)
</label>

<input type="number"
name="jumlah_bibit"
value="<?= $data['jumlah_bibit'] ?>"
class="form-control form-control-lg"
placeholder="Contoh: 400"
required>

<br>

<label class="font-weight-bold">
<i class="fas fa-money-bill-wave text-success"></i> Modal (Rp)
</label>

<input type="number"
name="modal"
value="<?= $data['modal'] ?? 0 ?>"
class="form-control form-control-lg"
placeholder="Contoh: 1000000"
required>

</div>

<hr>

<button type="submit"
name="submit"
class="btn btn-success btn-lg btn-block shadow">

<i class="fas fa-save"></i> Update Data Tanam

</button>

</form>

</div>

</div>

</div>

<!-- PANEL INFO -->
<div class="col-lg-4">

<div class="card shadow border-left-success">

<div class="card-body">

<h5 class="font-weight-bold text-success">
<i class="fas fa-info-circle"></i> Informasi
</h5>

<hr>

<p class="text-gray-600 small">
Gunakan halaman ini untuk memperbarui data penanaman.
</p>

<ul class="small text-gray-700">
<li>Pilih lahan yang digunakan</li>
<li>Masukkan tanggal penanaman</li>
<li>Isi jenis bibit</li>
<li>Tambahkan modal tanam</li>
</ul>

</div>

</div>

</div>

</div>

</div>
