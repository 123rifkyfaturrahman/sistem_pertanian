<?php
include "koneksi.php";

$id = $_GET['id'];

$data = mysqli_fetch_array(mysqli_query($conn,"
SELECT * FROM penjualan WHERE id='$id'
"));

$panen = mysqli_query($conn,"
SELECT panen.id, lahan.nama_lahan, tanam.jenis_bibit
FROM panen
JOIN tanam ON panen.id_tanam = tanam.id
JOIN lahan ON tanam.id_lahan = lahan.id
");

if(isset($_POST['update'])){

$id_panen = $_POST['id_panen'];
$jumlah = $_POST['jumlah_kg'];
$harga = $_POST['harga_perkg'];

$total = $jumlah * $harga;

mysqli_query($conn,"
UPDATE penjualan SET
id_panen='$id_panen',
jumlah_kg='$jumlah',
harga_perkg='$harga',
total_harga='$total'
WHERE id='$id'
");

echo "<script>
alert('Data berhasil diubah');
location='index.php?page=penjualan';
</script>";

}
?>

<div class="container-fluid">

<h3 class="mb-4">Edit Penjualan</h3>

<form method="POST">

<label>Pilih Panen</label>

<select name="id_panen" class="form-control">

<?php while($p=mysqli_fetch_array($panen)){ ?>

<option value="<?= $p['id'] ?>"
<?php if($p['id']==$data['id_panen']) echo "selected"; ?>>

<?= $p['nama_lahan'] ?> - <?= $p['jenis_bibit'] ?>

</option>

<?php } ?>

</select>


<br>

<label>Jumlah (Kg)</label>

<input type="number"
name="jumlah_kg"
value="<?= $data['jumlah_kg'] ?>"
class="form-control">

<br>

<label>Harga per Kg</label>

<input type="number"
name="harga_perkg"
value="<?= $data['harga_perkg'] ?>"
class="form-control">

<br>

<button class="btn btn-success" name="update">
Update
</button>

<a href="index.php?page=penjualan" class="btn btn-secondary">
Kembali
</a>

</form>

</div>