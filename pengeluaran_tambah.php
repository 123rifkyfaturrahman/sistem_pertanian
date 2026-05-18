<?php
include "koneksi.php";

if(isset($_POST['simpan'])){

$id_tanam = $_POST['id_tanam'];
$ket = $_POST['keterangan'];
$jumlah = $_POST['jumlah'];

if($id_tanam==""){
echo "<script>alert('Pilih data tanam terlebih dahulu');</script>";
}else{

mysqli_query($conn,"
INSERT INTO pengeluaran (id_tanam,keterangan,jumlah)
VALUES ('$id_tanam','$ket','$jumlah')
");

echo "<script>
alert('Pengeluaran berhasil ditambahkan');
location='index.php?page=pengeluaran';
</script>";

}
}
?>

<div class="container-fluid">

<h3 class="mb-4">Tambah Pengeluaran</h3>

<form method="POST">

<label>Pilih Tanam</label>

<select name="id_tanam" class="form-control" required>

<option value="">-- Pilih Tanam --</option>

<?php
$query = mysqli_query($conn,"
SELECT tanam.*, lahan.nama_lahan 
FROM tanam 
JOIN lahan ON tanam.id_lahan = lahan.id
");

while($t = mysqli_fetch_array($query)){
?>

<option value="<?= $t['id'] ?>">
<?= $t['nama_lahan'] ?> - <?= $t['tanggal_tanam'] ?>
</option>

<?php } ?>

</select>


<label>Keterangan</label>
<input type="text" name="keterangan" class="form-control" required>

<br>

<label>Jumlah</label>
<input type="number" name="jumlah" class="form-control" required>

<br>

<button class="btn btn-danger" name="simpan">
Simpan
</button>

<a href="index.php?page=pengeluaran" class="btn btn-secondary">
Kembali
</a>

</form>

</div>