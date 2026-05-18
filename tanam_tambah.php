<?php
include "koneksi.php";

if(isset($_POST['simpan'])){

$id_lahan = $_POST['id_lahan'];
$tanggal = $_POST['tanggal'];
$jenis = $_POST['jenis_bibit'];
$jumlah = $_POST['jumlah_bibit'];
$modal = $_POST['modal'];

if($id_lahan==""){
echo "<script>alert('Pilih lahan terlebih dahulu');</script>";
}else{

mysqli_query($conn,"
INSERT INTO tanam (id_lahan, tanggal_tanam, jenis_bibit, jumlah_bibit, modal)
VALUES ('$id_lahan','$tanggal','$jenis','$jumlah','$modal')
");

echo "<script>
alert('Data tanam berhasil ditambahkan');
location='index.php?page=tanam';
</script>";

}
}
?>

<div class="container-fluid">

<h3 class="mb-4">Tambah Data Tanam</h3>

<form method="POST">

<label>Pilih Lahan</label>
<select name="id_lahan" class="form-control" required>

<option value="">-- Pilih Lahan --</option>

<?php
$lahan = mysqli_query($conn,"SELECT * FROM lahan");
while($l = mysqli_fetch_array($lahan)){
?>

<option value="<?= $l['id'] ?>">
<?= $l['nama_lahan'] ?>
</option>

<?php } ?>

</select>

<br>

<label>Tanggal Tanam</label>
<input type="date" name="tanggal" class="form-control" required>

<br>

<label>Jenis Bibit</label>
<input type="text" name="jenis_bibit" class="form-control" required>

<br>

<label>Jumlah Bibit</label>
<input type="number" name="jumlah_bibit" class="form-control" required>

<br>

<label>Modal (Rp)</label>
<input type="number" name="modal" class="form-control" required>

<br>

<button class="btn btn-success" name="simpan">
Simpan
</button>

<a href="index.php?page=tanam" class="btn btn-secondary">
Kembali
</a>

</form>

</div>